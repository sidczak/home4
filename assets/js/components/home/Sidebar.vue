<template lang="pug">
b-row
    b-col(cols="12")
        .mb-5
            a.btn.btn-turquoise(@click="show = !show")
                | button
    b-col
        nav.navbar.flex-column.navbar-dark.bg-turquoise-concave-145.h-100.d-inline-flex(:class="[position, {'navbar-expand': show}]")
            a.navbar-brand.mr-0(href="#")
                i.fab.fa-fw.fa-vuejs.fa-2x.mb-3
            ul.navbar-nav.flex-column(:class="{'w-100': !show}")
                li.nav-item
                    a.nav-link.active(v-if="!show" href="#")
                        i.fas.fa-fw.fa-home.mr-1
                        | Start
                    a.nav-link.active(v-else href="#" v-b-tooltip.hover.right title="Start")
                        i.fas.fa-fw.fa-home.mr-1
                li.nav-item.dropdown.dropright
                    a.nav-link.dropdown-toggle(href="#" id="navbarDropdownComponents" data-toggle="dropdown")
                        i.fas.fa-fw.fa-puzzle-piece.mr-1
                        span(:class="{'d-none': show}") Components
                    div.dropdown-menu(aria-labelledby="navbarDropdownComponents")
                            h6.dropdown-header
                                | Components
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
                    a.nav-link.dropdown-toggle(href="#" id="navbarDropdownExamples" data-toggle="dropdown")
                        i.fas.fa-fw.fa-tools.mr-1
                        span(:class="{'d-none': show}") Examples
                    div.dropdown-menu(aria-labelledby="navbarDropdownExamples")
                            h6.dropdown-header
                                |  Examples
                            a.dropdown-item(href="#")
                                | Album
                            a.dropdown-item(href="#")
                                | Browser
            ul.navbar-nav.flex-column.mt-auto(:class="{'w-100': !show}")
                li.nav-item
                    a.nav-link(v-if="!show" href="#")
                        i.fas.fa-fw.fa-project-diagram.mr-1
                        | Project
                    a.nav-link(v-else href="#" v-b-tooltip.hover.right title="Project")
                        i.fas.fa-fw.fa-project-diagram.mr-1
                li.nav-item
                    a.nav-link(v-if="!show" href="#")
                        i.far.fa-fw.fa-address-card.mr-1
                        | Contact
                    a.nav-link(v-else href="#" v-b-tooltip.hover.right title="Contact")
                        i.far.fa-fw.fa-address-card.mr-1
    b-col
        nav.navbar.flex-column.navbar-light.bg-clouds-concave-145.shadow-clouds.h-100.d-inline-flex(:class="{'navbar-expand': show}")
            a.navbar-brand.mr-0(href="#")
                i.fab.fa-fw.fa-vuejs.fa-2x.mb-3
            ul.navbar-nav.flex-column(:class="{'w-100': !show}")
                li.nav-item
                    a.nav-link.active(href="#")
                        i.fas.fa-fw.fa-home.mr-1
                        span(:class="{'d-none': show}") Start
                li.nav-item.dropdown.dropright
                    a.nav-link.dropdown-toggle(href="#" id="navbarDropdownComponents" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false")
                        i.fas.fa-fw.fa-tools.mr-1
                        span(:class="{'d-none': show}") Components
                    div.dropdown-menu(aria-labelledby="navbarDropdownComponents")
                            h6.dropdown-header
                                | Components
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
                        i.fas.fa-fw.fa-tools.mr-1
                        span(:class="{'d-none': show}") Examples
                    div.dropdown-menu(aria-labelledby="navbarDropdownExamples")
                            h6.dropdown-header
                                |  Examples
                            a.dropdown-item(href="#")
                                | Album
                            a.dropdown-item(href="#")
                                | Browser
            ul.navbar-nav.flex-column.mt-auto(:class="{'w-100': !show}")
                li.nav-item
                    a.nav-link(href="#")
                        i.fas.fa-fw.fa-tools.mr-1
                        span(:class="{'d-none': show}") Portfolio
                li.nav-item
                    a.nav-link(href="#")
                        i.fas.fa-fw.fa-tools.mr-1
                        span(:class="{'d-none': show}") Circle Progress
</template>
<script>
export default {
    name: "SoundCard",
    props: {
        position: {
            type: String,
            default: '',
            validator: (value) => ['fixed-left', 'fixed-right', ''].indexOf(value) > -1,
        },
    },
    data () {
        return {
            show: true
        }
    },
};
</script>
<style lang="scss" scoped>
.flex-left {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    z-index: 1030;
}
// .dropdown.narrow:hover {
//     .dropdown-menu {
//         display: block;
//     }
// }
</style>