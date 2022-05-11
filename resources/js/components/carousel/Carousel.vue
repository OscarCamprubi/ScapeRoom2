<template>
    <div class="carousel" @keydown="checkSlide($event)" tabindex="0">
        <slot></slot>
        <button @click.prevent="next" class="bttn bttn-next rounded-pill bg-white"><i
            class="bi bi-arrow-right text-black"></i></button>
        <button @click.prevent="prev" class="bttn bttn-prev rounded-pill bg-white"><i
            class="bi bi-arrow-left text-black"></i></button>
    </div>
</template>
<script>
export default {
    data() {
        return {
            index: 0,
            slides: [],
            slideDirection: '',
        }
    },
    computed: {
        slidesLength() {
            return this.slides.length;
        }
    },
    mounted() {
        this.slides = this.$children;
        this.slides.map((slide, index) => {
            slide.index = index;
        });
    },
    methods: {
        next() {
            this.index++;
            if (this.index >= this.slidesLength) {
                this.index = 0;
            }
            this.slideDirection = 'slide-right';
        },
        prev() {
            this.index--;
            if (this.index < 0) {
                this.index = this.slidesLength - 1;
            }
            this.slideDirection = 'slide-left';
        },
        checkSlide(event) {
            if (event.keyCode === 39) {
                this.next();
            } else if (event.keyCode === 37) {
                this.prev();
            } else {
                return;
            }
        },
    }
}
</script>
<style>
.bttn {
    padding: 5px 10px;
    background-color: rgba(0, 0, 0, 0.5);
    border: 1px solid transparent;
    margin: 5px 10px;
    color: #FFF;
    height: 50px;
    width: 50px;
    position: absolute;
    margin-top: -25px;
    z-index: 2;
}

.bttn:hover {
    cursor: pointer;
}

.bttn:focus {
    outline: none;
}

.bttn-next {
    top: 50%;
    right: 0;
}

.bttn-prev {
    top: 50%;
    left: 0;
}

i {
    font-size: 25px;
}
</style>
