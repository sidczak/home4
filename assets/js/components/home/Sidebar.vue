<template lang="pug">
nav.navbar.flex-column.h-100.d-inline-flex(:class="[position, bg, navbar, {'navbar-expand': show}]")
    a.navbar-brand.mr-0(href="#")
        i.fab.fa-fw.fa-vuejs.fa-2x.mb-3
    ul.navbar-nav.flex-column(:class="{'w-100': !show}")
        li.nav-item
            a.nav-link(v-if="!show" @click="show = !show")
                i.fas.fa-fw.fa-angle-double-left.mr-1
            a.nav-link(v-else @click="show = !show")
                i.fas.fa-fw.fa-angle-double-right.mr-1
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
        li.nav-item.dropdown.dropright
            a.nav-link.dropdown-toggle(href="#" id="navbarDropdownSitemap" data-toggle="dropdown")
                i.fas.fa-fw.fa-sitemap.mr-1
                span(:class="{'d-none': show}") Dropdown
            div.dropdown-menu(aria-labelledby="navbarDropdownSitemap")
                    h6.dropdown-header
                        |  Second
                    a.dropdown-item(href="#")
                        | Dropdown Second
                    a.dropdown-item(href="#")
                        | Dropdown Second
                    a.dropdown.dropdown-item(href="#" id="navbarDropdownSitemap2" data-toggle="dropdown")
                        i.fas.fa-fw.fa-sitemap.mr-1
                        | Dropdown
                        i.fas.fa-fw.fa-caret-right
                        div.dropdown-menu(aria-labelledby="navbarDropdownSitemap2")
                                h6.dropdown-header
                                    |  Third
                                a.dropdown-item(href="#")
                                    | Dropdown Third
                                a.dropdown-item(href="#")
                                    | Dropdown Third
        li.nav-item.dropdown.dropright.dropdown-hover(v-if="show")
            a.nav-link.dropdown-toggle(href="#" id="navbarDropdownSitemap")
                i.fas.fa-fw.fa-sitemap.mr-1
                span(:class="{'d-none': show}") Dropdown
            div.dropdown-menu(aria-labelledby="navbarDropdownSitemap")
                    h6.dropdown-header
                        |  Second
                    a.dropdown-item(href="#")
                        | Dropdown Second
                    a.dropdown-item(href="#")
                        | Dropdown Second
                    a.dropdown.dropdown-item.dropdown-hover(href="#" id="navbarDropdownSitemap2")
                        i.fas.fa-fw.fa-sitemap.mr-1
                        | Dropdown
                        i.fas.fa-fw.fa-caret-right
                        div.dropdown-menu(aria-labelledby="navbarDropdownSitemap2")
                                h6.dropdown-header
                                    |  Third
                                a.dropdown-item(href="#")
                                    | Dropdown Third
                                a.dropdown-item(href="#")
                                    | Dropdown Third
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
        bg: {type: String, default: "bg-turquoise-concave-145"},
        navbar: {type: String, default: "navbar-dark"},
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
.dropdown.dropdown-hover:hover {
    & > .dropdown-menu {
        display: block;
    }
}
</style>