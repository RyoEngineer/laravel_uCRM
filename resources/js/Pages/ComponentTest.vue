<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const emitTest = e => console.log(e)

</script>

<template>
<GuestLayout>
    <InputLabel value = "件名" /><br>
    <TextInput 
        modelValue = "初期値"
        @update:modelValue = "emitTest"
    >
    </TextInput><br>
    <PrimaryButton type ="submit">送信</PrimaryButton>
</GuestLayout>
</template> 