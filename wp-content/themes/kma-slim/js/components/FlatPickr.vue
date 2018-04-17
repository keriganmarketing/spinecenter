<template>
    <div class="control has-icons-left">
        <flat-pickr v-model="date" :name="name" :placeholder="placeholder" :config="config" :required="required"></flat-pickr>
        <span class="icon is-small is-left">
            <i :class="['fa', this.icon ]"></i>
        </span>
    </div>
</template>

<script>
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';

    export default {

        props: {
            placeholder: this.placeholder,
            required: this.required,
            config: this.config,
            icon: this.icon,
            name: this.name
        },

        data() {
            return {
                date: null
            }
        },

        components: {
            flatPickr
        }
    }
</script>
