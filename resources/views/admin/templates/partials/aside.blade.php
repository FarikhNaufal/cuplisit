<aside class="flex-col bg-white w-[21rem] max-h-max hidden lg:flex rounded-br-3xl shadow-lg z-50">
    <a href="/" class="flex justify-center pt-20">
        <h1 class="text-5xl text-secondry">ADMIN<span class="text-primary">.IT</span></h1>
    </a>
    <div class="mx-8">
        
        <button
            class=" group w-full flex mt-4 p-3 hover:bg-primary text-primary text-lg rounded-xl border border-1 shadow-lg"
            onclick="window.location.href='/admin/'">
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                class="mx-4 group-hover:fill-white fill-primary my-1" viewBox="0 0 30 21" fill="none">
                <path
                    d="M24.1206 20.86C24.9292 19.446 25.4451 17.738 24.8316 15.75C24.0927 13.342 21.9874 11.48 19.4777 11.242C18.5471 11.1423 17.606 11.2529 16.7234 11.5659C15.8409 11.8789 15.0394 12.3863 14.3776 13.0508C13.7158 13.7154 13.2105 14.5202 12.8988 15.4064C12.587 16.2925 12.4768 17.2375 12.5762 18.172C12.8271 20.678 14.6675 22.806 17.0657 23.548C19.0594 24.164 20.7465 23.646 22.1547 22.834L25.6403 26.334C26.1841 26.88 27.0485 26.88 27.5923 26.334C27.7214 26.2059 27.824 26.0533 27.894 25.885C27.964 25.7168 28 25.5363 28 25.354C28 25.1717 27.964 24.9912 27.894 24.823C27.824 24.6547 27.7214 24.5021 27.5923 24.374L24.1206 20.86ZM18.8224 21C16.8705 21 15.3368 19.46 15.3368 17.5C15.3368 15.54 16.8705 14 18.8224 14C20.7744 14 22.308 15.54 22.308 17.5C22.308 19.46 20.7744 21 18.8224 21ZM13.9425 25.2V28C6.24625 28 0 21.728 0 14C0 6.272 6.24625 0 13.9425 0C20.6907 0 26.3096 4.816 27.6062 11.2H24.7201C24.2852 9.50857 23.4624 7.94273 22.3173 6.62762C21.1722 5.31251 19.7366 4.28458 18.1253 3.626V4.2C18.1253 5.74 16.8705 7 15.3368 7H12.5483V9.8C12.5483 10.57 11.9209 11.2 11.154 11.2H8.36552V14H11.154V18.2H9.75977L3.0813 11.494C2.90005 12.306 2.78851 13.132 2.78851 14C2.78851 20.174 7.79387 25.2 13.9425 25.2Z" />
            </svg>
            <h1 class="group-hover:text-white">ReportPostingan</h1>
        </button>
    </div>

</aside>
<script>
    function previewMediax(input) {
        const preview = document.getElementById('media-preview1');
        const parent = document.getElementById('media-parent1');
        const addMediaBtn = document.getElementById('add-media-btn1')
        const file = input.files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.classList.remove('hidden');
            parent.classList.remove('hidden')
            document.getElementById('delete-icon1').classList.remove(
                'hidden');
            addMediaBtn.classList.add('hidden')
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
            parent.classList.add('hidden');
            document.getElementById('delete-icon1').classList.add(
                'hidden');
            addMediaBtn.classList.remove('hidden')
        }
    }

    function deleteMediax() {
        // Fungsi ini akan dijalankan ketika ikon hapus diklik
        document.getElementById('media-preview1').src = ''; // Menghapus gambar
        document.getElementById('media-preview1').classList.add('hidden'); // Menyembunyikan gambar
        document.getElementById('delete-icon1').classList.add('hidden'); // Menyembunyikan ikon hapus
        document.getElementById('media-parent1').classList.add('hidden');
        document.getElementById('add-media-btn1').classList.remove('hidden');
        document.getElementById('media-input1').value = ''; // Mengosongkan nilai input file
    }

    function openPostInputx() {
        document.getElementById('media-input1').click();
    }
</script>
