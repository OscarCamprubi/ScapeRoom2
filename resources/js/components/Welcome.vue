<template>
    <div class="app">
        <layout></layout>
        <carousel>
            <carousel-slide v-for="slide in slides" :key="slide" class="carousel-slider">
                <img :src="slide" :alt="slide">
            </carousel-slide>
        </carousel>
    </div>
</template>

<script>
import Carousel from './carousel/Carousel';
import CarouselSlide from './carousel/CarouselSlide';
import Layout from "./Layout";

export default {
    data(){
        return {
            slides: [
                'https://picsum.photos/id/1019/5472/3648',
                'https://picsum.photos/id/1022/6000/3376',
                'https://picsum.photos/id/1040/4496/3000',
                'https://picsum.photos/id/1041/5184/2916',
                'https://picsum.photos/id/1050/6000/4000',
                'https://picsum.photos/id/1067/5760/3840',
                'https://picsum.photos/id/108/2000/1333',
            ]
        }
    },

    components : {
        Carousel : Carousel,
        CarouselSlide : CarouselSlide,
        Layout: Layout,
    }
}
</script>

<style>
.app {
    display:flex;
    justify-content: center;
}
layout {
    top: 0px;
}
.carousel {
    position:relative;
    overflow: hidden;
    width:800px;
    height:500px;
    z-index:10;
}

.carousel-slider {
    position:absolute;
    top:0;
    left:0;
    bottom:0;
    right:0;
}
.carousel-slider img {
    width:100%;
    height:100%;
}

</style>
