function offsetTop(element, acc = 0) {
    if (element.offsetParent) {
        return offsetTop(element.offsetParent, acc + element.offsetTop);
    }
    return acc + element.offsetTop;
}

class Parallax {
    constructor(element) {
        this.element = element
        this.ratio = parseFloat(element.dataset.parallax);

        this.onScroll = this.onScroll.bind(this);
        this.onIntersection = this.onIntersection.bind(this);
        this.onResize = this.onResize.bind(this);

        const observer= new IntersectionObserver(this.onIntersection);
        observer.observe(element);      
    }

    onIntersection(entries) {
        for (const entry of entries) {
            if (entry.isIntersecting) {
                document.addEventListener('scroll', this.onScroll);
                window.addEventListener('resize', this.onResize);
            } else {
                document.removeEventListener('scroll', this.onScroll);
                window.removeEventListener('resize', this.onResize);
            }
        }
    }

    onResize() {
        this.elementY = offsetTop(this.element) + this.element.offsetHeight / 2;
        this.onScroll();
    }

    onScroll () {
        //console.log(this.element.getAttribute('class'));
        const screenY = window.scrollY + window.innerHeight / 2;
        const elementY = offsetTop(this.element) + this.element.offsetHeight / 2;
        const diffY = elementY - screenY;
        this.element.style.setProperty(
            'transform', 
            `translateY(${diffY * -1 * this.ratio}px)`
            );
    }

    static bind() {
        return Array.from(document.querySelectorAll('[data-parallax]')).map(
            (element) => {
            return new Parallax(element);
        });
    }
}

Parallax.bind();