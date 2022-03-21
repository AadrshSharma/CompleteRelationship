<template>
    <div>
        <slot name="xyz"></slot>
        <input type="text" v-model="child_data">
        <div>This is Child1 Component</div>
        <div>I'm {{ parent_variable }}</div>
        <div>I'm from child data: {{ child_data }}</div>
        <slot></slot>
    </div>
</template>


<script>
    import { eventBus } from "../Models/_events";
    export default {
        data() {
            return {
                child_data: ''
            }
        },
        props: ['parent_variable'],
        methods: {
            emittingEvents(){
                eventBus.$emit('child_data_pass_event', this.child_data)
            }
        },
        watch: {
            'child_data': {
                handler: 'emittingEvents'
            }
        }
    }
</script>
