<template>
    <div>
        <section id="loginPage" :style="{
            backgroundImage: 'url(' + bgLogin + ')'
        }">
        <div class="loginContent">
            <div class="loginCard">
                <div class="decor" :style="{
            backgroundImage: 'url(' + building + ')'
        }">
                    <div class="content">
                        <span class="logo">
                            <img :src="ImageLogo" alt="">
                        </span>
                        <span class="dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="description">
                            <p>
                                Os melhores e mais completos cursos de Laravel do Brasil, cursos com projetos reais. Do zero ao profissional.
                            </p>
                        </span>
                        <span class="copyright fontSmall">
                            Todos os Direitos reservados - <b>Especializati</b>
                        </span>
                    </div>
                </div>
                <div class="login">
                    <div class="content">
                        <span class="logo">
                            <img :src="logoDark" alt="">
                        </span>
                        <span>
                            <p>Seja muito bem vindo!</p>
                        </span>
                        <span class="dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="description">
                            Acesse nossa plataforma e desfrute de cursos completos para sua especialização.
                        </span>
                        <form action="/dist/index.html" method="">
                            <div class="groupForm">
                                <i class="far fa-envelope"></i>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="groupForm">
                                <i class="far fa-key"></i>
                                <input type="password" name="password" placeholder="Senha" required>
                                <i class="far fa-eye buttom"></i>
                            </div>
                            <button class="btn primary" type="submit">Login</button>
                        </form>
                        <span>
                            <p class="fontSmall">Esqueceu sua senha? 
                                <router-link :to="{name: 'forget.password'}">Clique aqui</router-link>
                            </p>
                        </span>
                    </div>
                    <span class="copyright fontSmall">
                        Todos os Direitos reservados - <b>Especializati</b>
                    </span>
                </div>
            </div>
        </div>
    </section>
    </div>
</template>

<script>
import imageLogo from '@/assets/images/logo.svg'
import bgLogin from '@/assets/images/bgLogin.png'
import building from '@/assets/images/building.jpg'
import logoDark from '@/assets/images/logoDark.svg'

    export default{
        name:'Auth',
        data(){
            return{
                ImageLogo: imageLogo,
                bgLogin: bgLogin,
                building: building,
                logoDark: logoDark,
            }
        }
    }
</script>