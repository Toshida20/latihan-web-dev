document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.menuTambahan li').forEach(item => {
        const button = item.querySelector('button');
        const answer = item.querySelector('.answer');
        const ikon = item.querySelector('img');

        if (!button || !answer) return;

        button.addEventListener('click', () => {
            const buka = item.classList.contains('buka');

            document.querySelectorAll('.menuTambahan li').forEach(i => {
                i.classList.remove('buka');
                const a = i.querySelector('.answer');
                if (a) a.style.maxHeight = null;
                i.querySelector('img').src = '../assets/plusIcon.png';
            });

            if (!buka) {
                item.classList.add('buka');
                answer.style.maxHeight = answer.scrollHeight + 'px';
                ikon.src = '../assets/closeIcon.png';
            }
        });
    });
});