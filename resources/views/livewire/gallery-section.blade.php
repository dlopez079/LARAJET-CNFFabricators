
<script src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.js"></script>

<div
    x-data="{
        skip: 3,
        atBeginning: false,
        atEnd: false,
        next() {
            this.to((current, offset) => current + (offset * this.skip))
        },
        prev() {
            this.to((current, offset) => current - (offset * this.skip))
        },
        to(strategy) {
            let slider = this.$refs.slider
            let current = slider.scrollLeft
            let offset = slider.firstElementChild.getBoundingClientRect().width
            slider.scrollTo({ left: strategy(current, offset), behavior: 'smooth' })
        },
        focusableWhenVisible: {
            'x-intersect:enter'() {
                this.$el.removeAttribute('tabindex')
            },
            'x-intersect:leave'() {
                this.$el.setAttribute('tabindex', '-1')
            },
        },
        disableNextAndPreviousButtons: {
            'x-intersect:enter'() {
                let slideEls = this.$el.parentElement.children

                // If this is the first slide.
                if (slideEls[0] === this.$el) {
                    this.atBeginning = true
                // If this is the last slide.
                } else if (slideEls[slideEls.length-1] === this.$el) {
                    this.atEnd = true
                }
            },
            'x-intersect:leave'() {
                let slideEls = this.$el.parentElement.children

                // If this is the first slide.
                if (slideEls[0] === this.$el) {
                    this.atBeginning = false
                // If this is the last slide.
                } else if (slideEls[slideEls.length-1] === this.$el) {
                    this.atEnd = false
                }
            },
        },
    }"
    class="flex flex-col w-full"
>
    <div
        x-on:keydown.right="next"
        x-on:keydown.left="prev"
        tabindex="0"
        role="region"
        aria-labelledby="carousel-label"
        class="flex space-x-6"
    >
        <h2 id="carousel-label" class="sr-only" hidden>Carousel</h2>

        <!-- Prev Button -->
        <button
            x-on:click="prev"
            class="text-6xl"
            :aria-disabled="atBeginning"
            :tabindex="atEnd ? -1 : 0"
            :class="{ 'opacity-50 cursor-not-allowed': atBeginning }"
        >
            <span aria-hidden="true">❮</span>
            <span class="sr-only">Skip to previous slide page</span>
        </button>

        <span id="carousel-content-label" class="sr-only" hidden>Carousel</span>

        <ul
            x-ref="slider"
            tabindex="0"
            role="listbox"
            aria-labelledby="carousel-content-label"
            class="flex w-full overflow-x-scroll snap-x snap-mandatory"
        >
            <li x-bind="disableNextAndPreviousButtons" class="snap-start w-1/3 shrink-0 flex flex-col items-center justify-center p-2" role="option">
                <img class="mt-2 w-full" src="https://picsum.photos/400/200?random=1" alt="placeholder image">

                <button x-bind="focusableWhenVisible" class="px-4 py-2 text-sm">Do Something</button>
            </li>

            <li x-bind="disableNextAndPreviousButtons" class="snap-start w-1/3 shrink-0 flex flex-col items-center justify-center p-2" role="option">
                <img class="mt-2 w-full" src="https://picsum.photos/400/200?random=2" alt="placeholder image">

                <button x-bind="focusableWhenVisible" class="px-4 py-2 text-sm">Do Something</button>
            </li>

            <li x-bind="disableNextAndPreviousButtons" class="snap-start w-1/3 shrink-0 flex flex-col items-center justify-center p-2" role="option">
                <img class="mt-2 w-full" src="https://picsum.photos/400/200?random=3" alt="placeholder image">

                <button x-bind="focusableWhenVisible" class="px-4 py-2 text-sm">Do Something</button>
            </li>

            <li x-bind="disableNextAndPreviousButtons" class="snap-start w-1/3 shrink-0 flex flex-col items-center justify-center p-2" role="option">
                <img class="mt-2 w-full" src="https://picsum.photos/400/200?random=4" alt="placeholder image">

                <button x-bind="focusableWhenVisible" class="px-4 py-2 text-sm">Do Something</button>
            </li>

            <li x-bind="disableNextAndPreviousButtons" class="snap-start w-1/3 shrink-0 flex flex-col items-center justify-center p-2" role="option">
                <img class="mt-2 w-full" src="https://picsum.photos/400/200?random=5" alt="placeholder image">

                <button x-bind="focusableWhenVisible" class="px-4 py-2 text-sm">Do Something</button>
            </li>

            <li x-bind="disableNextAndPreviousButtons" class="snap-start w-1/3 shrink-0 flex flex-col items-center justify-center p-2" role="option">
                <img class="mt-2 w-full" src="https://picsum.photos/400/200?random=6" alt="placeholder image">

                <button x-bind="focusableWhenVisible" class="px-4 py-2 text-sm">Do Something</button>
            </li>
        </ul>

        <!-- Next Button -->
        <button
            x-on:click="next"
            class="text-6xl"
            :aria-disabled="atEnd"
            :tabindex="atEnd ? -1 : 0"
            :class="{ 'opacity-50 cursor-not-allowed': atEnd }"
        >
            <span aria-hidden="true">❯</span>
            <span class="sr-only">Skip to next slide page</span>
        </button>
    </div>
</div>