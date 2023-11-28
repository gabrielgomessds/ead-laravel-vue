<template>
  <div class="home">
   
        <div class="pageTitle">
            <span class="title">Meus Cursos</span>
            <span class="dots">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>

        <div class="content">
            <ul class="listCourses">
               <card-course-vue
                   :title="'Curso de Laravel com VueJS'"
                   :image="''"
                   :bgName="'laravel'"
                   />
            </ul>
        </div>
   
  </div>
</template>

<script>
import CardCourseVue from './components/CardCourse.vue'
 
  export default {
    name: 'Home',
    components: {
      CardCourseVue
    }
    
  }
</script>