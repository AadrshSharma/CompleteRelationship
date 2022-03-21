<template>
    <div>
        <input type="text" v-model="parent_data">
        <div>This is Parent Component</div>
        <child1 :parent_variable="parent_data">
            <div>This is inside child HTML div tag</div>
            <template v-slot:xyz>
                <div>This is slot</div>
            </template>
        </child1>
        <child2 :parent_variable="parent_data"></child2>
    </div>
</template>


<script>
    import Child1 from './Child1'
    import Child2 from './Child2'
    export default {
        name:'Parent',
        components: {Child1, Child2},
        data() {
            return {
                parent_data: 'Coming from Parent'
            }
        }
    }
</script>
