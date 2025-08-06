// Custom JavaScript for FAQ page
document.addEventListener('DOMContentLoaded', function() {
    // Add FAQ link to header menu
    const headerMenu = document.querySelector('.main-menu');
    if (headerMenu) {
        const faqLi = document.createElement('li');
        const faqLink = document.createElement('a');
        faqLink.href = '/faq';
        faqLink.textContent = 'FAQ';
        faqLi.appendChild(faqLink);
        headerMenu.appendChild(faqLi);
    }

    // Add FAQ link to footer menu
    const footerMenu = document.querySelector('.widget-list');
    if (footerMenu) {
        const faqLi = document.createElement('li');
        const faqLink = document.createElement('a');
        faqLink.href = '/faq';
        faqLink.textContent = 'FAQ';
        faqLi.appendChild(faqLink);
        footerMenu.appendChild(faqLi);
    }

    // Add FAQ link to mobile menu
    const mobileMenu = document.querySelector('.mobile-navigation nav ul');
    if (mobileMenu) {
        const faqLi = document.createElement('li');
        const faqLink = document.createElement('a');
        faqLink.href = '/faq';
        faqLink.textContent = 'FAQ';
        faqLi.appendChild(faqLink);
        mobileMenu.appendChild(faqLi);
    }
    
    // Fix for accordion functionality
    const accordionButtons = document.querySelectorAll('.accordion button[data-toggle="collapse"]');
    
    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const target = document.querySelector(this.getAttribute('data-target'));
            const icon = this.querySelector('.accordion-icon');
            
            // Toggle the collapse manually if needed
            if (target) {
                if (target.classList.contains('show')) {
                    // Closing the accordion
                    target.classList.remove('show');
                    this.setAttribute('aria-expanded', 'false');
                    if (icon) icon.style.transform = 'rotate(0deg)';
                } else {
                    // Opening the accordion
                    // First close all other accordions
                    const parent = target.getAttribute('data-parent');
                    if (parent) {
                        const siblings = document.querySelectorAll(parent + ' .collapse.show');
                        siblings.forEach(sibling => {
                            if (sibling !== target) {
                                sibling.classList.remove('show');
                                const siblingButton = document.querySelector('[data-target="#' + sibling.id + '"]');
                                if (siblingButton) {
                                    siblingButton.setAttribute('aria-expanded', 'false');
                                    const siblingIcon = siblingButton.querySelector('.accordion-icon');
                                    if (siblingIcon) siblingIcon.style.transform = 'rotate(0deg)';
                                }
                            }
                        });
                    }
                    
                    // Open this accordion
                    target.classList.add('show');
                    this.setAttribute('aria-expanded', 'true');
                    if (icon) icon.style.transform = 'rotate(180deg)';
                }
            }
        });
    });
});