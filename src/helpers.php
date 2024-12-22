<?php

declare(strict_types=1);

use Prajwal89\LaraToast\LaraToast;

if (!function_exists('laraToast')) {
    function laraToast()
    {
        return new LaraToast;
    }
}

if (!function_exists('laraToastJs')) {
    function laraToastJs()
    {
        return <<<'JS'
            function showToast(type, title, description, autoCloseInMs) {
                const container = document.querySelector('.toast-container');
                const toast = document.createElement('div');
                toast.className = 'toast ' + type;
                
                const icons = {
                    success: `<svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>`,
                    info: `<svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>`,
                    danger: `<svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>`
                };
    
                toast.innerHTML = `
                    <div class="toast-icon">${icons[type]}</div>
                    <div class="toast-content">
                        <div class="toast-title">${title}</div>
                        <div class="toast-description">${description}</div>
                    </div>
                    <button class="close-btn" onclick="closeToast(this)" aria-label="Close notification">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>`;
    
                container.appendChild(toast);
    
                if (autoCloseInMs){
                    setTimeout(() => {
                        toast.style.opacity = '0';
                        toast.style.transform = 'translateX(100%)';
                        setTimeout(() => {
                            container.removeChild(toast);
                        }, 300);
                    }, autoCloseInMs);
                }
            }
    
            function closeToast(button) {
                const toast = button.closest('.toast');
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }
    JS;
    }
}

if (!function_exists('laraToastCss')) {
    function laraToastCss()
    {
        return <<<'CSS'
            .toast-container {
                position: fixed;
                top: 1rem;
                right: 1rem;
                z-index: 50;
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
                pointer-events: none;
                min-width: 20rem;
                z-index: 9999;
                max-width: calc(100% - 2rem);
            }
    
            .toast {
                pointer-events: auto;
                position: relative;
                display: flex;
                align-items: start;
                gap: 0.75rem;
                width: 100%;
                max-width: 420px;
                padding: 1rem;
                border-radius: 0.5rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                animation: toast-enter 0.15s ease-out;
                transition: all 0.3s ease;
            }
    
            .toast-icon {
                flex-shrink: 0;
                width: 1.5rem;
                height: 1.5rem;
                margin-top: 0.125rem;
            }
    
            .toast-content {
                flex: 1;
                min-width: 0;
            }
    
            .toast-title {
                font-weight: 600;
                font-size: 0.875rem;
                line-height: 1.25rem;
                margin-bottom: 0.25rem;
            }
    
            .toast-description {
                font-size: 0.875rem;
                line-height: 1.25rem;
                opacity: 0.9;
            }
    
            .toast .close-btn {
                position: absolute;
                top: 0.75rem;
                right: 0.75rem;
                padding: 0.25rem;
                color: currentColor;
                opacity: 0.5;
                border: none;
                background: transparent;
                cursor: pointer;
                border-radius: 0.375rem;
                transition: opacity 0.15s;
            }
    
            .toast .close-btn:hover {
                opacity: 1;
            }
    
            .toast.success {
                background-color: #ecfdf5;
                color: #065f46;
                border: 1px solid #a7f3d0;
            }
    
            .toast.info {
                background-color: #eff6ff;
                color: #1e40af;
                border: 1px solid #bfdbfe;
            }
    
            .toast.danger {
                background-color: #fef2f2;
                color: #991b1b;
                border: 1px solid #fecaca;
            }
    
            @keyframes toast-enter {
                from {
                    opacity: 0;
                    transform: translateX(100%);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
    
            @media (max-width: 640px) {
                .toast {
                    max-width: 100%;
                }
                
                .toast-container {
                    left: 1rem;
                }
            }
    CSS;
    }
}
