<template lang="pug">
    section.py-5.bg-light
        b-container
            b-row
                b-col(md="4" v-for="n in 9" :key="n.id")
                    //- b-card.mb-4.shadow-sm
                    //- b-card.mb-4.shadow-sm(img-src="holder.js/100px225?bg=353b47&fg=6c757d&size=30" img-top)
                    b-card.mb-4.shadow-sm(img-src="https://picsum.photos/600/300/?image=25" img-top)
                        //- img(class="card-img-top" data-src="holder.js/100px225?bg=353b47&fg=6c757d&size=30")
                        img(src="../../../../images/welcome/bg.jpg" class="card-img")
                        //- img(data-src="holder.js/100px225?bg=353b47&fg=6c757d&size=30" class="card-img")
                        //- img(v-holder="'img=100px200?auto=yes&theme=social&text=Full width'")
                        b-card-text
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