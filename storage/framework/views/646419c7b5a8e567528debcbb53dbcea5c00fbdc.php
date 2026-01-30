<div class="bg-slate-950 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center py-2 gap-3">
            
            <!-- Left Side: Contact Info -->
            <div class="flex flex-wrap justify-center md:justify-start items-center gap-4 text-[13px] font-medium">
                <a href="tel:18003092626" class="flex items-center text-slate-300 hover:text-blue-400 transition-colors duration-200">
                    <span class="w-6 h-6 rounded-full bg-slate-800 flex items-center justify-center mr-2">
                        <ion-icon name="call-outline" class="text-xs"></ion-icon>
                    </span>
                    1800 309 2626
                </a>
                
                <span class="hidden md:block text-slate-700">|</span>
                
                <a href="mailto:enquiry@sonadeviuniversity.ac.in" class="flex items-center text-slate-300 hover:text-blue-400 transition-colors duration-200">
                    <span class="w-6 h-6 rounded-full bg-slate-800 flex items-center justify-center mr-2">
                        <ion-icon name="mail-outline" class="text-xs"></ion-icon>
                    </span>
                    enquiry@sonadeviuniversity.ac.in
                </a>

                <span class="hidden md:block text-slate-700">|</span>

                <div class="flex items-center text-slate-400">
                    <span class="w-6 h-6 rounded-full bg-slate-800 flex items-center justify-center mr-2">
                        <ion-icon name="calendar-clear-outline" class="text-xs"></ion-icon>
                    </span>
                    <?php echo e(date('d-M-Y')); ?>

                </div>
            </div>

            <!-- Right Side: Social Media -->
            <div class="flex items-center gap-2">
                <a target="_blank" href="https://wa.me/+916207582536" class="w-8 h-8 flex items-center justify-center rounded-lg bg-emerald-500/10 text-emerald-500 hover:bg-emerald-500 hover:text-white transition-all duration-300">
                    <ion-icon name="logo-whatsapp"></ion-icon>
                </a>
                <a target="_blank" href="https://www.facebook.com/SDUGhatsila" class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-600/10 text-blue-500 hover:bg-blue-600 hover:text-white transition-all duration-300">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a target="_blank" href="https://www.youtube.com/@SDUGhatsila" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-600/10 text-red-500 hover:bg-red-600 hover:text-white transition-all duration-300">
                    <ion-icon name="logo-youtube"></ion-icon>
                </a>
                <a target="_blank" href="https://www.instagram.com/sonadeviuniversity/" class="w-8 h-8 flex items-center justify-center rounded-lg bg-pink-600/10 text-pink-500 hover:bg-pink-600 hover:text-white transition-all duration-300">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Essential styles for the header (Place in your CSS or layout head) -->
<style>
    /* Ensure ion-icons are visible in the header */
    ion-icon {
        visibility: visible !important;
    }
</style><?php /**PATH /opt/lampp/htdocs/prospectus-new-version/resources/views/include/header.blade.php ENDPATH**/ ?>