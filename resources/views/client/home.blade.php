@extends('layouts.template-client')
@section('title', "AEON CREDIT SERVICE INDONESIA - HOME")
@section('content')
    <section class="w-full bg-primary text-white flex items-center">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 text-justify">
            <h2 class="font-bold">Sejarah</h2>
            <p>
                Didirikan di Jakarta pada tahun 2006, PT AEON Credit Service Indonesia ("Perusahaan") merupakan 
                perusahaan yang bergerak dalam bidang pembiayaan konsumen. Pada tahun 2013, Perusahaan meluncurkan 
                bisnis Kartu Kredit kepada Pasar Indonesia mengikuti jejak sesama perusahaan afiliasi di Jepang dan di luar 
                Jepang. Perusahaan sendiri merupakan anak perusahaan dari AEON Financial Service Co., Ltd. yang juga 
                beroperasi di bawah naungan AEON Group (AEON Co., Ltd.) di Jepang. AEON Co., Ltd. merupakan 
                konglomerasi ritel terbesar di Jepang yang memiliki lebih dari 300 anak perusahaan dan telah beroperasi di 13 
                negara. Dengan prinsip dasar untuk mewujudkan kedamaian, menghormati individu, dan berkontribusi pada 
                komunitas lokal dengan tetap berorientasi kepada pelanggan, AEON akan terus berinovasi untuk menjadi 
                peritel No.1 di Asia.
            </p>
            
            <p>
                Sejalan dengan pertumbuhan AEON Family di Jepang, AEON Financial Service Co., Ltd. (AFSJ), memberikan 
                solusi keuangan menyeluruh seperti layanan kredit, perbankan, e money, dan konsultasi keuangan demi 
                meningkatkan gaya hidup maupun kebutuhan jangka panjang konsumen AFSJ sendiri saat ini merupakan salah 
                satu pemimpin pasar penerbit kartu kredit dan pembiayaan konsumen terbesar di Jepang. Sementara itu, 
                AEON Credit Service Co., Ltd., sebagai anak perusahaan dari AEON Financial Service Japan Co., Ltd. (AFSJ), 
                memiliki bisnis kartu kredit yang saat ini telah beranggotakan lebih dari 37 juta pelanggan di Jepang (data 
                bulan Juni 2016). AFSJ merupakan bagian dari AEON Group yang memiliki budaya perusahaan untuk selalu 
                mengutamakan pelanggan
            </p>
        </div>
    </section>

    <section class="w-full bg-base-100 flex items-center">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="font-bold text-primary">Bekerja di PT. AEON CREDIT SERVICE INDONESIA</h2>
                <ul class="list-disc text-justify">
                    <li>
                        Saat Anda sedang memulai karier atau ingin naik ke level berikutnya, karier 
                        di PAMA memberdayakan Anda untuk menyesuaikan aspirasi karier Anda.
                    </li>
                    <li>
                        Kami mendorong karyawan kami untuk mengeksplorasi dan menggunakan 
                        seluruh bakat mereka untuk mencapai potensi penuh mereka di PAMA.
                    </li>
                    <li>
                        Inovasi adalah sumber kehidupan setiap perusahaan, kami menyambut 
                        semua ide hebat. Orang orang kami bekerja bersama sebagai satu tim dan 
                        memberikan dampak pada bisnis.
                    </li>
                    <li>
                        Kami fokus membangun dan memberdayakan masyarakat lokal dengan 
                        tumbuh secara sinergi, guna menciptakan keharmonisan dengan 
                        masyarakat.
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-4">
                <figure class="aspect-[4/12] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
                <figure class="aspect-[4/12] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
                <figure class="aspect-[4/12] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
            </div>
        </div>
    </section>

    <section class="w-full bg-base-100 flex items-center">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="font-bold text-primary">Pembelajaran dan Pengembangan</h2>
                <p class="text-justify">
                    Investasi pada sumber daya manusia kami adalah salah satu prioritas kami. 
                    Dengan Menerapkan model 70:20:10, pembelajaran dan pengembangan Anda 
                    adalah investasi utama kami.
                </p>
                <ul class="list-disc text-justify">
                    <li>
                        Pengalaman kerja adalah salah satu pengalaman yang efektif dan sangat 
                        diperlukan untuk mengembangkan pemimpin masa depan. Kami 
                        mengembangkan karyawan kami dari tugas yang menantang karyawan, 
                        memperhatikan orang lain, dan berpartisipasi di tempat kerja.
                    </li>
                    <li>
                        Pengembangan melalui orang lain untuk mengeluarkan potensi penuh 
                        Anda, sebagian besar dilakukan oleh Supervisor atau Manajer, baik yang 
                        berfokus pada Individu atau Kinerja Anda.
                    </li>
                    <li>
                        Belajar dari kelas dan untuk diimplementasikan pada Pengalaman Kerja 
                        Anda, baik itu pelatihan soft skill atau fungsional tertentu.
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-4">
                <figure class="aspect-[4/12] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
                <figure class="aspect-[4/12] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
                <figure class="aspect-[4/12] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
            </div>
        </div>
    </section>

    <section class="w-full bg-base-100 flex items-center">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="font-bold text-primary">Nilai Inti Perusahaan</h2>
                <ul class="list-disc text-justify">
                    <li>Tim sinergis</li>
                    <li>Bertindak dengan penuh tanggung jawab</li>
                    <li>Siap menghadapi tantangan dan teraktualisasikan</li>
                    <li>Perbaikan berkelanjutan</li>
                    <li>Dia adalah hidup kita</li>
                    <li>Menghadapi nilai tambah kepada seluruh pemangku kepentingan</li>
                </ul>
            </div>
            <div class="flex items-center gap-4">
                <figure class="aspect-[4/8] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
                <figure class="aspect-[4/8] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
                <figure class="aspect-[4/8] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
            </div>
        </div>
    </section>

    <section class="w-full bg-base-100 flex items-center">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="font-bold text-primary">DNA Sumber Daya Manusia</h2>
                <h3 class="font-semibold">"Life at ACSI"</h3>
                <ul class="list-disc text-justify">
                    <li>Ilmiah</li>
                    <li>Akuntable</li>
                    <li>Lincah</li>
                    <li>Integritas</li>
                    <li>Dewasa</li>
                    <li>Gigih</li>
                    <li>Keberanian</li>
                </ul>
            </div>
            <div class="flex items-center gap-4">
                <figure class="overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
            </div>
        </div>
    </section>

    <section class="w-full bg-base-100 flex items-center">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 text-justify">
            <h2 class="font-bold text-primary text-center">Lokasi AEON Service Counter</h2>
            <p class="text-center">
                PT AEON Credit Service Indonesia mempunyai lima belas (15) WK Batubara dan dua (2) WK Emas. Area Operasional didukung oleh satu 
                (1) Kantor Pusat dan tiga (2) Kantor Pendukung
            </p>
            <figure class="overflow-hidden rounded-md shadow-lg">
                <img 
                src={{ asset('assets/images/image-1.jpeg') }} 
                alt=""
                class="w-full h-full object-cover object-center">
            </figure>
        </div>
    </section>

    <section class="w-full bg-base-100 flex items-center">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="font-bold text-primary">di PT. AEON Credit Service Indonesia</h2>
                <q>
                    Kantor kami lebih dari sekadar tempat kerja. Kantor kami adalah pusat energi 
                    dan sinergi. Sejak pertama kali Anda masuk, Anda akan disambut oleh 
                    atmosfer yang dipenuhi antusiasme dan semangat terhadap apa yang kami 
                    lakukan.
                </q>
            </div>
            <div class="flex items-center gap-4">
                <figure class="overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
            </div>
        </div>
    </section>

    <section class="w-full bg-base-100 flex items-center">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 text-justify">
            <h2 class="font-bold text-primary text-center">Department</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-8">
                <figure class="aspect-[3/4] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
                <figure class="aspect-[3/4] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
                <figure class="aspect-[3/4] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
                <figure class="aspect-[3/4] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
                <figure class="aspect-[3/4] overflow-hidden rounded-md shadow-lg">
                    <img 
                    src={{ asset('assets/images/image-1.jpeg') }} 
                    alt=""
                    class="w-full h-full object-cover object-center">
                </figure>
            </div>
        </div>
    </section>

    <section class="w-full bg-base-100 flex items-center">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 text-justify">
            <h2 class="font-bold text-primary">Ijin Usaha PT. AEON Credit Service Indonesia</h2>
            <p>
                Izin usaha sebagai Lembaga Keuangan yang diterbitkan oleh Otoritas Jasa 
                Keuangan (sebelumnya di bawah naungan "Kementrian Keuangan RI") dalam 
                Surat Keputusan Menteri Keuangan No. KEP 070/KM12/2006 tanggal 22 
                Agustus 2006. Izin sebagai Penerbit Kartu Kredit yang diterbitkan oleh Bank 
                Indonesia dalam Surat No. 15/172/DASP/GPKSP tanggal 13 Juni 2013.
            </p>
        </div>
    </section>

    <section class="w-full bg-base-100 flex items-center">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 text-justify">
            <h2 class="font-bold text-primary">Tata Kelola yang Baik</h2>
            <p>
                PT AEON Credit Service Indonesia mengembangkan struktur dan sistem Tata 
                Kelola Perusahaan Yang Baik (Good Corporate Governance atau GCG") 
                dengan memperhatikan prinsip prinsip GCG sesuai dengan ketentuan dalam 
                Peraturan OJK No.30/POJK.05/2014 tentang Tata Kelola Perusahaan Yang 
                Baik Bagi Perusahaan Pembiayaan.
            </p>
        </div>
    </section>
@endsection