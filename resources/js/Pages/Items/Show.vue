<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { nl2br } from '@/common'
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    item: Object
})
const deleteItem = id => {
    Inertia.delete(route('items.destroy', {item:id}),{
        onBefore: () => confirm("本当に削除しますか？")
    })
}
</script>

<template>
    <Head title="商品詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">商品詳細</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font relative">
                                <div class="container px-5 py-6 mx-auto">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <table>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">商品名: </td>
                                                <td>{{ item.name }}</td>
                                            </tr>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">価格: </td>
                                                <td>{{ item.price }}</td>
                                            </tr>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">メモ: </td>
                                                <td v-html="nl2br(item.memo)" ></td>
                                            </tr>
                                            <tr class ="h-20">
                                                <td class="w-20 leading-7" style="font-weight:bild">ステータス: </td>
                                                <td>
                                                    <span v-if="item.is_selling === 1">販売中</span>
                                                    <span v-if="item.is_selling === 0">停止中</span>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="p-2 w-full">
                                            <Link as = "button" :href="route('items.edit', { item: item.id })" class="mr-6 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集</Link>
                                            <button @click= "deleteItem(item.id)"  class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">削除</button>
                                        </div>                                        
                                    </div>
                                    </div> 
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
