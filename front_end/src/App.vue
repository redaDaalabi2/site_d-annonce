<template>
  <div>
    <Navbar :setvr="setvr" :showings="showings"/>
    <router-view :setvr="setvr" :showings="showings"/>
    <Footer />
  </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";
import Footer from "./components/Footer.vue";
export default {
  name: "App",
  data() {
    return {
      showings: false
    };
  },
  components: {
    Navbar,
    Footer
  },
  methods: {
    setvr(value) {
      this.showings = value;
    }
  },
  mounted() {
    if(localStorage.getItem('token') !== null){
      this.setvr(true);
    }
  }
}
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
