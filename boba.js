document.addEventListener('DOMContentLoaded', function() {
    const body = document.body;
    const bubbleCount = 20;

    for (let i = 0; i < bubbleCount; i++) {
        createBubble();
    }

    function createBubble() {
        const bubble = document.createElement('div');
        bubble.classList.add('boba-bubble');
        
        const size = Math.random() * 30 + 10;
        bubble.style.width = `${size}px`;
        bubble.style.height = `${size}px`;
        
        bubble.style.left = `${Math.random() * 100}vw`;
        bubble.style.top = `${Math.random() * 100}vh`;
        
        body.appendChild(bubble);
        
        animateBubble(bubble);
    }

    function animateBubble(bubble) {
        const duration = Math.random() * 10 + 5;
        const direction = Math.random() > 0.5 ? 1 : -1;

        bubble.animate([
            { transform: 'translate(0, 0)' },
            { transform: `translate(${direction * 50}px, -100vh)` }
        ], {
            duration: duration * 1000,
            iterations: Infinity,
            easing: 'linear'
        });
    }
});