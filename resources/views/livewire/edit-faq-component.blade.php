<div class="">
    {{-- <livewire:toastr /> --}}
    <div class=" border-b border-gray-300 dark:border-opacity-20 ">
        <div class="max-w-4xl mx-auto px-10  flex justify-between  py-16">
            <h1 class="sm:text-4xl text-xl text-newgray-900 dark:text-newgray-300 font-semibold ">New faq</h1>
            <div class="z-30">
                <button wire:loading.remove wire:target='storeAksi'  wire:click='storeAksi' id="btnStore" class="inline-flex sm:px-16 px-8 sm:py-2 py-1 rounded dark:hover:bg-newgray-900 dark:hover:border-gray-200 dark:hover:text-gray-200 hover:bg-white hover:text-newgray-900 border hover:border-newgray-900 bg-newgray-900 dark:bg-gray-100 text-newgray-100 dark:text-newgray-900">
                    Save
                </button>
                <button wire:loading wire:target='storeAksi' id="btnStore" class="inline-flex sm:px-16 px-8 sm:py-2 py-1 rounded dark:hover:bg-newgray-900 dark:hover:border-gray-200 dark:hover:text-gray-200 hover:bg-white hover:text-newgray-900 border hover:border-newgray-900 bg-newgray-900 dark:bg-gray-100 text-newgray-100 dark:text-newgray-900">
                    <svg class="animate-spin mx-auto h-6 w-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-6 md:px-8  py-8 min-h-screen" x-data="{ tabs: 'indonesia' }">

    <div  class="overflow-x-auto scrollbar-hide whitespace-nowrap   subpixel-antialiased flex mb-6 justify-end">
            {{-- tabs english --}}
        <div @click="tabs='english'" class="hover:bg-gray-200 dark:hover:bg-newgray-700 py-2 px-2 rounded  cursor-pointer"
            :class="{ 'border-b-2 border-newgray-900 dark:border-gray-300' : tabs === 'english' }"
            >
                <a  class=" px-0.5  text-newgray-900 dark:text-gray-400 text-sm   hover:text-newgray-900 dark:hover:text-gray-300 "
                :class="{ 'font-black' : tabs === 'english' }"
                >English</a>
            </div>
            {{-- tabs indonesia --}}
            <div @click="tabs='indonesia'" class="hover:bg-gray-200 dark:hover:bg-newgray-700 py-2 px-2 rounded  cursor-pointer"
            :class="{ 'border-b-2 border-newgray-900 dark:border-gray-300' : tabs === 'indonesia' }"
            >
                <a  class=" px-0.5  text-newgray-900 dark:text-gray-400 text-sm   hover:text-newgray-900 dark:hover:text-gray-300 "
                :class="{ 'font-bold' : tabs === 'indonesia' }"
                >Indonesia</a>
        </div>

    </div>

    <div class="grid grid-cols-12 gap-x-4" >

        <div class=" col-span-12 " >

            {{-- tab english --}}
            <div x-show="tabs==='english'" x-cloak style="display: none !important">


                <div class="w-full border border-gray-300 dark:border-opacity-20 rounded px-6 py-6 mb-6" x-data="{count:0}">
                    <h1 class=" font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4">Question</h1>
                    <textarea   rows="6"  wire:model.defer='questionEN' required class="bg-gray-100 dark:bg-newgray-700 text-newgray-700 dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Question english. . ."></textarea>

                </div>
                <div class="w-full border border-gray-300 dark:border-opacity-20  px-6 py-6 mb-6">
                    <h1 class=" font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4">Answer</h1>
                    <div class="w-full  "
                        wire:ignore
                        x-init="
                        tinymce.init({
                            selector: '#answerEN',
                            height : 500,
                            height : '70vh',
                            relative_urls : false,
                                remove_script_host : false,
                                convert_urls : true,
                                content_style: 'body {  background-color: #f4f5f7; }',
                                plugins:
                                    'lists advlist autolink  link image  charmap    anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template  help',

                                    toolbar: ' fullscreen fontfamily fontsizeselect fontsize   bold italic underline forecolor backcolor |  link image  |  bullist numlist   alignleft aligncenter alignright alignjustify outdent indent| ' +
                                            ' | media  | ' +
                                            ' backcolor emoticons |undo redo  help',
                                    menu: {
                                    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
                                    },
                                    menubar: ' file edit view insert format tools table help',
                                    file_picker_callback : function(callback, value, meta) {
                                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                        var cmsURL = '/cms/' + 'fire-filemanager?editor=' + meta.fieldname;
                                        if (meta.filetype == 'image') {
                                            cmsURL = cmsURL + '&type=Images';
                                        } else {
                                            cmsURL = cmsURL + '&type=Files';
                                        }
                                        tinyMCE.activeEditor.windowManager.openUrl({
                                            url : cmsURL,
                                            title : 'Filemanager',
                                            width : x * 0.8,
                                            height : y * 0.8,
                                            resizable : 'yes',
                                            close_previous : 'no',
                                            onMessage: (api, message) => {
                                            callback(message.content);
                                            }
                                        });
                                    },
                                    setup: function(editor) {
                                        editor.on('change', function(e) {
                                            @this.set('answerEN', editor.getContent());
                                    });
                                }
                        });">
                        <textarea rows="20" id="answerEN" name="answerEN"  wire:model.defer='answerEN' required></textarea>
                    </div>
                </div>
            </div>

            {{-- tab indonesia --}}
            <div x-show="tabs==='indonesia'" x-cloak style="display: none !important">

                <div class="w-full border border-gray-300 dark:border-opacity-20 rounded px-6 py-6 mb-6" x-data="{count:0}">
                    <h1 class=" font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4">Question</h1>
                    <textarea   rows="6"  wire:model.defer='questionID' required class="bg-gray-100 dark:bg-newgray-700 text-newgray-700 dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Question Indonesia. . ."></textarea>

                </div>
                <div class="w-full border border-gray-300 dark:border-opacity-20  px-6 py-6 mb-6">
                    <h1 class=" font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4">Answer</h1>
                    <div class="w-full"
                        wire:ignore
                        x-init="
                        tinymce.init({
                            selector: '#answerID',
                            height : 500,
                            height : '70vh',
                            relative_urls : false,
                                remove_script_host : false,
                                convert_urls : true,
                                content_style: 'body {  background-color: #f4f5f7; }',
                                plugins:
                                    'lists advlist autolink  link image  charmap    anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template  help',

                                    toolbar: ' fullscreen fontfamily fontsizeselect fontsize   bold italic underline forecolor backcolor |  link image  |  bullist numlist   alignleft aligncenter alignright alignjustify outdent indent| ' +
                                            ' | media  | ' +
                                            ' backcolor emoticons |undo redo  help',
                                    menu: {
                                    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
                                    },
                                    menubar: ' file edit view insert format tools table help',
                                    file_picker_callback : function(callback, value, meta) {
                                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                        var cmsURL = '/cms/' + 'fire-filemanager?editor=' + meta.fieldname;
                                        if (meta.filetype == 'image') {
                                            cmsURL = cmsURL + '&type=Images';
                                        } else {
                                            cmsURL = cmsURL + '&type=Files';
                                        }
                                        tinyMCE.activeEditor.windowManager.openUrl({
                                            url : cmsURL,
                                            title : 'Filemanager',
                                            width : x * 0.8,
                                            height : y * 0.8,
                                            resizable : 'yes',
                                            close_previous : 'no',
                                            onMessage: (api, message) => {
                                            callback(message.content);
                                            }
                                        });
                                    },
                                    setup: function(editor) {
                                        editor.on('change', function(e) {
                                            @this.set('answerID', editor.getContent());
                                    });
                                }
                        });">
                        <textarea rows="20" id="answerID" name="answerID"  wire:model.defer='answerID' required></textarea>
                    </div>
                </div>
            </div>




        </div>
    </div>
    </div>


</div>
