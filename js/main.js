document.addEventListener('DOMContentLoaded', function() {
    initNavigation();
    initSkillBars();
    initProjectModal();
    initContactForm();
    initSmoothScrolling();
});

function initNavigation() {
    const navLinks = document.querySelectorAll('.nav-link');
    const currentPage = window.location.pathname.split('/').pop() || 'index.php';
    
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPage) {
            link.classList.add('active');
        }
    });
}

function initSkillBars() {
    const skillBars = document.querySelectorAll('.skill-progress');
    
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const skillBar = entry.target;
                const width = skillBar.style.width;
                skillBar.style.width = '0%';
                setTimeout(() => {
                    skillBar.style.width = width;
                }, 200);
                observer.unobserve(skillBar);
            }
        });
    }, observerOptions);
    
    skillBars.forEach(bar => {
        observer.observe(bar);
    });
}

function initProjectModal() {
    const modal = document.getElementById('projectModal');
    if (!modal) return;
    
    const viewProjectBtns = document.querySelectorAll('.view-project');
    const closeBtn = document.querySelector('.close');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    const modalTechnologies = document.getElementById('modalTechnologies');
    const modalGithub = document.getElementById('modalGithub');
    const modalDemo = document.getElementById('modalDemo');
    
    viewProjectBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const projectIndex = this.getAttribute('data-project');
            
            if (typeof projectsData !== 'undefined' && projectsData[projectIndex]) {
                const project = projectsData[projectIndex];
                
                modalImage.src = project.foto;
                modalImage.alt = project.isim;
                modalTitle.textContent = project.isim;
                modalDescription.textContent = project.aciklama;
                
                modalTechnologies.innerHTML = '';
                project.teknolojiler.forEach(tech => {
                    const techTag = document.createElement('span');
                    techTag.className = 'tech-tag';
                    techTag.textContent = tech;
                    modalTechnologies.appendChild(techTag);
                });
                
                if (project.github && project.github !== '#') {
                    modalGithub.href = project.github;
                    modalGithub.style.display = 'inline-flex';
                    modalGithub.onclick = function(e) {
                        window.open(project.github, '_blank');
                    };
                } else {
                    modalGithub.style.display = 'none';
                }
                
                modalDemo.style.display = 'none';
                
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
        });
    });
    
    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }
    
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display === 'block') {
            closeModal();
        }
    });
}

function initContactForm() {
    const contactForm = document.getElementById('contactForm');
    if (!contactForm) return;
    
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const messageInput = document.getElementById('message');
    const submitBtn = contactForm.querySelector('.submit-btn');
    
    if (nameInput) {
        nameInput.addEventListener('blur', validateName);
        nameInput.addEventListener('input', clearError);
    }
    
    if (emailInput) {
        emailInput.addEventListener('blur', validateEmail);
        emailInput.addEventListener('input', clearError);
    }
    
    if (messageInput) {
        messageInput.addEventListener('blur', validateMessage);
        messageInput.addEventListener('input', clearError);
    }
    
    contactForm.addEventListener('submit', function(e) {
        let isValid = true;
        
        if (!validateName()) isValid = false;
        if (!validateEmail()) isValid = false;
        if (!validateMessage()) isValid = false;
        
        if (!isValid) {
            e.preventDefault();
            return false;
        }
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Gönderiliyor...';
        submitBtn.disabled = true;
    });
    
    function validateName() {
        const nameError = document.getElementById('nameError');
        const name = nameInput.value.trim();
        
        if (name.length < 2) {
            showError(nameError, 'Ad soyad en az 2 karakter olmalıdır.');
            return false;
        }
        
        if (name.length > 100) {
            showError(nameError, 'Ad soyad 100 karakterden uzun olamaz.');
            return false;
        }
        
        if (!/^[a-zA-ZğüşıöçĞÜŞİÖÇ\s]+$/.test(name)) {
            showError(nameError, 'Ad soyad sadece harfler içerebilir.');
            return false;
        }
        
        hideError(nameError);
        return true;
    }
    
    function validateEmail() {
        const emailError = document.getElementById('emailError');
        const email = emailInput.value.trim();
        
        if (!email) {
            showError(emailError, 'E-posta alanı boş bırakılamaz.');
            return false;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showError(emailError, 'Geçerli bir e-posta adresi giriniz.');
            return false;
        }
        
        if (email.length > 255) {
            showError(emailError, 'E-posta adresi çok uzun.');
            return false;
        }
        
        hideError(emailError);
        return true;
    }
    
    function validateMessage() {
        const messageError = document.getElementById('messageError');
        const message = messageInput.value.trim();
        
        if (message.length < 10) {
            showError(messageError, 'Mesaj en az 10 karakter olmalıdır.');
            return false;
        }
        
        if (message.length > 1000) {
            showError(messageError, 'Mesaj 1000 karakterden uzun olamaz.');
            return false;
        }
        
        hideError(messageError);
        return true;
    }
    
    function showError(errorElement, message) {
        errorElement.textContent = message;
        errorElement.style.display = 'block';
        errorElement.parentElement.querySelector('input, textarea').style.borderColor = 'rgb(var(--danger-color))';
    }
    
    function hideError(errorElement) {
        errorElement.style.display = 'none';
        errorElement.parentElement.querySelector('input, textarea').style.borderColor = 'rgb(var(--border))';
    }
    
    function clearError(e) {
        const errorElement = e.target.parentElement.querySelector('.error-message');
        if (errorElement) {
            hideError(errorElement);
        }
    }
}

function initSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                const headerHeight = document.querySelector('.header').offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

window.addEventListener('scroll', debounce(function() {
    const header = document.querySelector('.header');
    if (window.scrollY > 100) {
        header.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
        header.style.backdropFilter = 'blur(10px)';
    } else {
        header.style.backgroundColor = 'rgb(var(--background))';
        header.style.backdropFilter = 'none';
    }
}, 10));

function addEntranceAnimations() {
    const cards = document.querySelectorAll('.info-card, .project-card, .education-item');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        observer.observe(card);
    });
}

document.addEventListener('DOMContentLoaded', addEntranceAnimations);

window.addEventListener('load', function() {
    document.body.classList.add('loaded');
});

document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img');
    
    images.forEach(img => {
        img.addEventListener('error', function() {
            this.style.backgroundColor = 'rgb(var(--surface-secondary))';
            this.style.color = 'rgb(var(--text-muted))';
            this.style.display = 'flex';
            this.style.alignItems = 'center';
            this.style.justifyContent = 'center';
            this.style.fontSize = '0.875rem';
            this.innerHTML = 'Resim yüklenemedi';
        });
    });
});
