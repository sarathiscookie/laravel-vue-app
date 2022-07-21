<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- <router-link class="navbar-brand" to="/">Laravel-Vue-App</router-link> -->

                                            <!-- OR -->

                <router-link class="navbar-brand" :to="{name: 'home'}">Laravel-Vue-App</router-link>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="ICON">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <!-- <router-link class="nav-link" to="/contact">Contact US</router-link> -->

                                                        <!-- OR -->
                            
                            <router-link class="nav-link" :to="{name: 'contact'}">Contact US</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>
