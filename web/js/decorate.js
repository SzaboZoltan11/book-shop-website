(() => {
    const boxes = []
    const boxCount = 20
    /** @type {HTMLElement} */
    const container = document.getElementById('decoration')

    for (let i = 0; i < boxCount; i++) {
        const width = 80 + Math.round(Math.random() * 170)
        const x = (Math.random() * window.innerWidth) - (width / 2)
        const y = (Math.random() * window.innerHeight) - (width / 2)
        
        const element = document.createElement('div')
        element.style.position = 'absolute'
        element.style.width = `${width}px`
        element.style.height = `${width}px`
        element.style.backgroundColor = '#fff1' 
        element.style.top = `${Math.round(y)}px`
        element.style.left = `${Math.round(x)}px`
        element.style.transform = `rotate(45deg)`
        container.appendChild(element)
        boxes.push({
            element: element,
            x: x,
            y: y,
            v: (Math.random() - 0.5) * 2, 
        })
    }

    setInterval(() => {
        for (const element of boxes) {
            const x = element.x + Math.cos(performance.now() * 0.0003 * element.v) * 50
            const y = element.y + Math.sin(performance.now() * 0.0003 * element.v) * 50
            element.element.style.top = `${Math.round(y)}px`
            element.element.style.left = `${Math.round(x)}px`
        }
    }, 10)
})()
