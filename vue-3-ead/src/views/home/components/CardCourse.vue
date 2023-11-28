<template>
    <div>
      <li>
        <span :class="['card', 'bg-' + bgName]">
          <span class="icon">
            <img :src="getImageSrc()" :alt="title">
          </span>
          <span class="title">{{ title }}</span>
          <span class="action">
            <a href="trainings.html" class="btn laravel">Acessar</a>
          </span>
        </span>
        <span class="dots">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </li>
    </div>
  </template>
  
  <script>
  // Importe a imagem no início do arquivo
  import defaultImage from '@/assets/images/icons/default.png';
  
  export default {
    name: 'CardCourse',
    props: ['title', 'image', 'bgName'],
    methods: {
      getImageSrc() {
        // Use a imagem fornecida ou a imagem padrão se não houver imagem
        return this.image !== '' ? this.image : defaultImage;
      },
    },
  };
  </script>
  