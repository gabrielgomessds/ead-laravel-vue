 <template>
    <header id="header">
        <nav>
            <span class="toggleMenu far fa-bars"></span>
            <span class="logo">
                <img :src="defaultImage" alt="">
            </span>
        </nav>
    </header>
 </template>

 <script>
 import defaultImage from '../../assets/images/logo.svg';
    export default {
        name: 'header-component'
    }
</script>