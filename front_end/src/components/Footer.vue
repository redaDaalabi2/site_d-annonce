<template>
    <footer class="bg-light shadow-sm py-4 hrbefore">
        <div class="container d-md-flex align-items-center">
            <a href="#" class="fw-bold fs-6 text-dark py-3">Book 
                <span class="text-primary">Now </span>
                <span class="fs-6">| Copyright &copy; 2022 All rights reserved</span>
            </a>
            <section class="ms-auto d-none-md py-3">
                <!-- Facebook -->
                <a class="btn btn-primary-dark m-1" href="#" role="button"><i class="fab fa-facebook-f"></i></a>
                <!-- Twitter -->
                <a class="btn btn-primary-dark m-1" href="#" role="button"><i class="fab fa-twitter"></i></a>
                <!-- Google -->
                <a class="btn btn-primary-dark m-1" href="#" role="button"><i class="fab fa-google"></i></a>
                <!-- Instagram -->
                <a class="btn btn-primary-dark m-1" href="#" role="button"><i class="fab fa-instagram"></i></a>
                <!-- Linkedin -->
                <a class="btn btn-primary-dark m-1" href="#" role="button"><i class="fab fa-linkedin-in"></i></a>
            </section>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer-bar"
}
</script>

<style scoped lang="scss">
* {
    list-style: none;
    text-decoration: none;
}
.hrbefore::before {
    content: '' !important;
    width: 98% !important;
    height: 2px !important;
    background-color: black !important;
    top: -5% !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    position: absolute !important;
}
</style>