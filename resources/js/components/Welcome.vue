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
                'https://picsum.photos/id/230/600/300',
                'https://picsum.photos/id/231/600/300',
                'https://picsum.photos/id/232/600/300',
                'https://picsum.photos/id/233/600/300',
                'https://picsum.photos/id/234/600/300',
                'https://picsum.photos/id/235/600/300',
                'https://picsum.photos/id/236/600/300',
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
