<template lang="pug">
    section.jumbotron.bg-white.text-center.mb-0
        b-container.text-center
            h1.jumbotron-heading
                | Album example
            p.lead.text-muted
                | Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.
            p
                b-button(href="#" variant="primary" class="my-2")
                    | Main call to action
                | 
                b-button(href="#" variant="secondary" class="my-2")
                    | Secondary action
        b-container
            b-row
                b-col
                    vue-typed-js(:strings="['First text', 'Second Text']" :loop="true" :typeSpeed="100")
                        h1
                            | I'm 
                            span(class="typing")
</template>