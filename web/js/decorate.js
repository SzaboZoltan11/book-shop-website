const boxes = []
const boxCount = 20 

for (let i = 0; i < boxCount; i++) {

    const x = Math.random() * window.innerWidth;
    

    const y = Math.random() * window.innerHeight;

    const element = document.createElement('div');
    element.style.position = 'absolute';
    element.style.width = `${80 + Math.round(Math.random() * 170)}px`; 
    element.style.height = element.style.width; 
    element.style.backgroundColor = '#fff1'; 
    element.style.top = `${Math.round(y)}px`;
    element.style.left = `${Math.round(x)}px`;
    element.style.transform = `rotate(45deg)`;
    element.style.zIndex = `-1`; 
    document.body.appendChild(element);
    boxes.push({
        element: element,
        x: x,
        y: y,
        v: (Math.random() - 0.5) * 2, 
    });
}

setInterval(() => {
    for (const element of boxes) {
        const x = element.x + Math.cos(performance.now() * 0.0003 * element.v) * 50;
        const y = element.y + Math.sin(performance.now() * 0.0003 * element.v) * 50;
        element.element.style.top = `${Math.round(y)}px`;
        element.element.style.left = `${Math.round(x)}px`;
    }
}, 10);
