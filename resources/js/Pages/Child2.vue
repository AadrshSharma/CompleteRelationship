<template>
    <div>
        <input type="text" v-model="parent_variable">
        <div>This is Child2 Component</div>
        <div>I'm {{ parent_variable }}</div>
        <div>I'm coming from child1 data: {{ child_one_data }}</div>
    </div>
</template>


<script>
    import { eventBus } from "../Models/_events"
    export default {
        data() {
            return {
                child_one_data: ''
            }
        },
        props: ['parent_variable'],
        created() {
            eventBus.$on('child_data_pass_event', (data) => {
                this.child_one_data = data
                // console.log(data)
            })
        }
    }
</script>
