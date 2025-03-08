<template>
    <div class="main-container pt-6 pb-6 sm:pt-8 sm:pb-8 bg-primary-950 text-white">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">

            <!--===== (col-1) =====-->
            <div>
                <div>
                    <img :src="master.footerLogo" class="h-10" loading="lazy" />
                </div>
                <div class="mt-4 max-w-[328px]">
                    <div class="text-white text-sm font-normal leading-normal">
                        {{ master.footerDescription }}
                    </div>

                    <div class="mt-3 p-3 bg-black bg-opacity-20 rounded-[56px] flex gap-3">
                        <DevicePhoneMobileIcon class="w-6 h-6 text-white" />
                        <div class="w-[0px] h-6 border border-primary-900"></div>
                        <div class="text-white text-base font-normal leading-normal">
                            {{ master.mobile }}
                        </div>
                    </div>

                    <div class="mt-3 p-3 bg-black bg-opacity-20 rounded-[56px] flex gap-3">
                        <EnvelopeIcon class="w-6 h-6 text-white" />
                        <div class="w-[0px] h-6 border border-primary-900"></div>
                        <div class="text-white text-base font-normal leading-normal">
                            {{ master.email }}
                        </div>
                    </div>
                </div>

                <div class="flex justify-start mt-3 items-center gap-6">
                    <div class="flex items-center gap-2 flex-wrap">
                        <a v-for="socialLink in master.socialLinks" :key="socialLink.name" target="_blank"
                            :href="socialLink.link" class="w-9 h-9 overflow-hidden" :title="socialLink.name">
                            <img :src="socialLink.logo" alt="" class="w-full h-full object-cover">
                        </a>
                    </div>
                </div>
            </div>

            <!--===== Quick Links (col-2) =====-->
            <div class="pt-3 sm:pt-0 border-t border-primary-700 sm:border-none">
                <div class="text-white text-base sm:text-lg font-bold tracking-wide leading-normal flex items-center justify-between" @click="!isLargeScreen ? showQuickLinks = !showQuickLinks : ''">
                    {{ $t('Quick Links') }}
                    <div class="transition-transform duration-300 block sm:hidden"
                        :class="showQuickLinks ? 'rotate-180' : ''">
                        <ChevronDownIcon class="w-5 h-5" />
                    </div>
                </div>

                <transition name="slide">
                    <div  v-if="showQuickLinks || isLargeScreen"  class="flex flex-col gap-0 mt-3">
                        <router-link to="/products"
                            class="my-2 hover:text-primary text-white text-base font-normal leading-normal">
                            {{ $t('Products') }}
                        </router-link>

                        <router-link to="/most-popular"
                            class="my-2 hover:text-primary text-white text-base font-normal leading-normal">
                            {{ $t('Most Popular') }}
                        </router-link>

                        <router-link to="/best-deal"
                            class="my-2 hover:text-primary text-white text-base font-normal leading-normal">
                            {{ $t('Best Deal') }}
                        </router-link>

                        <a v-if="master.getMultiVendor" href="/shop"
                            class="my-2 hover:text-primary text-white text-base font-normal leading-normal">
                            {{ $t('Become a Seller') }}
                        </a>

                        <router-link to="/blogs"
                            class="my-2 hover:text-primary text-white text-base font-normal leading-normal">
                            {{ $t('Blogs') }}
                        </router-link>
                    </div>
                </transition>
            </div>

            <!--===== Company (col-3) =====-->
            <div class="pt-3 lg:pt-0 border-t border-primary-700 md:border-none">
                <div class="text-white text-base sm:text-lg font-bold leading-normal tracking-wide flex items-center justify-between" @click="!isLargeScreen ? showCompany = !showCompany : ''">
                    {{ $t('Company') }}
                    <div class="transition-transform duration-300 block sm:hidden"
                        :class="showCompany ? 'rotate-180' : ''">
                        <ChevronDownIcon class="w-5 h-5" />
                    </div>
                </div>

                <transition name="slide">
                    <div v-if="showCompany || isLargeScreen" class="flex flex-col gap-0 mt-3">
                        <router-link to="/about-us"
                            class="py-2 hover:text-primary text-white text-base font-normal leading-normal">
                            {{ $t('About us') }}
                        </router-link>

                        <router-link v-if="master.getMultiVendor" to="/contact-us"
                            class="py-2 hover:text-primary text-white text-base font-normal leading-normal">
                            {{ $t('Contact') }}
                        </router-link>

                        <router-link to="/terms-and-conditions"
                            class="py-2 hover:text-primary text-white text-base font-normal leading-normal">
                            {{ $t('Terms & Conditions') }}
                        </router-link>

                        <router-link to="/privacy-policy"
                            class="py-2 hover:text-primary text-white text-base font-normal leading-normal">
                            {{ $t('Privacy Policy') }}
                        </router-link>
                    </div>
                </transition>
            </div>

            <!--===== Download our app (col-4) =====-->
            <div v-if="master.showDownloadApp" class="pt-3 lg:pt-0 border-t border-primary-700 md:border-none">
                <div class="text-white text-base sm:text-lg font-bold leading-normal tracking-wide">
                    {{ $t('Download our app') }}
                </div>

                <div class="mt-3">
                    <div v-if="master.footerQr" class="bg-white rounded-md w-28 overflow-hidden">
                        <img :src="master.footerQr" class="h-28 w-full" loading="lazy" />
                        <div class="text-center text-primary-950 text-sm font-normal leading-tight pb-1">
                            {{ $t('Scan the QR') }}
                        </div>
                    </div>

                    <div class="flex justify-start gap-4 mt-3">
                        <button class="border-none w-[119.70px] h-10 py-1 px-2 bg-primary-900 rounded-lg"
                            @click="appStore">
                            <img :src="'/assets/icons/appStoreFooter.svg'" alt="appStore"
                                class="w-full h-full object-fill" loading="lazy" />
                        </button>
                        <button class="border-none w-[119.70px] h-10 py-1 px-2 bg-primary-900 rounded-lg"
                            @click="playStore">
                            <img :src="'/assets/icons/playStoreFooter.svg'" alt="playStore"
                                class="w-full h-full object-fill" loading="lazy" />
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script setup>
import { onMounted, onBeforeUnmount, ref } from 'vue';
import { DevicePhoneMobileIcon, EnvelopeIcon } from '@heroicons/vue/24/outline';
import { ChevronDownIcon } from '@heroicons/vue/24/solid';

import { useMaster } from "../stores/MasterStore";
const master = useMaster();

const showQuickLinks = ref(false);
const showCompany = ref(false);

const isLargeScreen = ref(window.innerWidth >= 640);

onMounted(() => {
    window.addEventListener('resize', handleResize);
});

onBeforeUnmount(() => {
    window.removeEventListener('resize', handleResize);
});

const handleResize = () => {
    isLargeScreen.value = window.innerWidth >= 640;
    if (isLargeScreen.value) {
        showQuickLinks.value = true;
        showCompany.value = true;
    } else {
        showQuickLinks.value = false;
        showCompany.value = false;
    }
};

const appStore = () => {
    if (master.appStoreLink) {
        window.open(master.appStoreLink, '_blank');
    }
}

const playStore = () => {
    if (master.playStoreLink) {
        window.open(master.playStoreLink, '_blank');
    }
}

</script>
<style scoped>
.slide-enter-active,
.slide-leave-active {
    transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
}

.slide-enter-from,
.slide-leave-to {
    max-height: 0;
    opacity: 0;
}

.slide-enter-to,
.slide-leave-from {
    max-height: 500px;
    opacity: 1;
}
</style>
