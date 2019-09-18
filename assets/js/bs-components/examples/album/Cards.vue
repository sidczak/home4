<template lang="pug">
    section.py-5.bg-light
        b-container
            b-row
                b-col(md="4" v-for="n in 9" :key="n.id")
                    b-card.mb-4.shadow-sm
                        b-card-text {{ n }}
                            | {{ n }} This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                        .d-flex.justify-content-between.align-items-center
                            b-button-group
                                b-button(size="sm" variant="outline-secondary")
                                    | View
                                b-button(size="sm" variant="outline-secondary")
                                    | Edit
                            small.text-muted
                                | 9 mins
</template>