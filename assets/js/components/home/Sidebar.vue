<template lang="pug">
b-row
    b-col
        .sidebar-menu
            nav.navbar-expand.d-flex.flex-column.navbar-dark.bg-turquoise-concave-145.shadow-clouds.h-100
                a.navbar-brand(href="#")
                    i.fab.fa-fw.fa-vuejs.fa-2x.mb-3
                ul.navbar-nav.flex-column
                    li.nav-item
                        a.nav-link.active(href="#")
                            i.fas.fa-fw.fa-home
                            |&nbsp;Start
                    li.nav-item.dropdown.dropright
                        a.nav-link.dropdown-toggle(href="#" id="navbarDropdownComponents" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false")
                            i.fas.fa-fw.fa-tools 
                            |&nbsp;Components
                        div.dropdown-menu(aria-labelledby="navbarDropdownComponents")
                                h6.dropdown-header
                                    |  Components
                                a.dropdown-item.disabled(href="#")
                                    | Alert
                                a.dropdown-item(href="#")
                                    | Modal
                                a.dropdown-item(href="#")
                                    | Map
                                a.dropdown-item(href="#")
                                    | Hamburger
                                a.dropdown-item(href="#")
                                    | Portfolio
                                a.dropdown-item(href="#")
                                    | Circle Progress
                    li.nav-item.dropdown.dropright
                        a.nav-link.dropdown-toggle(href="#" id="navbarDropdownExamples" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false")
                            i.fas.fa-fw.fa-tools 
                            |&nbsp;Examples
                        div.dropdown-menu(aria-labelledby="navbarDropdownExamples")
                                h6.dropdown-header
                                    |  Examples
                                a.dropdown-item(href="#")
                                    | Album
                                a.dropdown-item(href="#")
                                    | Browser
                ul.navbar-nav.flex-column.mt-auto
                    li.nav-item
                        a.nav-link(href="#")
                            i.fas.fa-fw.fa-tools 
                            | Portfolio
                    li.nav-item
                        a.nav-link(href="#")
                            i.fas.fa-fw.fa-tools 
                            | Circle Progress
    b-col
        .sidebar-menu
            nav.navbar-expand.d-flex.flex-column.navbar-light.bg-clouds-concave-145.shadow-clouds.h-100
                a.navbar-brand(href="#")
                    i.fab.fa-fw.fa-vuejs.fa-2x.mb-3
                ul.navbar-nav.flex-column
                    li.nav-item
                        a.nav-link.active(href="#")
                            i.fas.fa-fw.fa-home
                    li.nav-item
                        a.nav-link(href="#")
                            i.fas.fa-fw.fa-tools
                    li.nav-item
                        a.nav-link(href="#")
                            i.fas.fa-fw.fa-tools
                ul.navbar-nav.flex-column.mt-auto
                    li.nav-item
                        a.nav-link(href="#")
                            i.fas.fa-fw.fa-tools
                    li.nav-item
                        a.nav-link(href="#")
                            i.fas.fa-fw.fa-tools
</template>
<script>    
export default {
    name: "SoundCard",
    props: {
    }, 
};
</script>
<style lang="scss" scoped>
.sidebar-menu {
    width: 160px;
    height: 400px;
    margin: auto;
}
</style>