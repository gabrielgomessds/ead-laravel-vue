 <template>
    <header id="header">
        <nav>
            <span class="toggleMenu far fa-bars"></span>
            <span class="logo">
                <router-link :to="{name: 'campus.home'}">
                <img :src="defaultImage" alt="EspecializaTI">
            </router-link>
                
            </span>
        </nav>
    </header>
 </template>

 <script>
 import defaultImage from '@/assets/images/logo.svg';
    export default {
        name: 'header-component',
        data(){
            return{
                defaultImage: defaultImage
            }
        }
    }
</script>