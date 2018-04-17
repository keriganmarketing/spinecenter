<template>
    <div class="control has-icons-left">
        <flat-pickr v-model="date" class="input" :placeholder="placeholder" :config="config" ></flat-pickr>
        <span class="icon is-small is-left">
            <i :class="['fa', this.icon ]"></i>
        </span>
        <input type="hidden" :name="name" :value="date" :required="required">
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
