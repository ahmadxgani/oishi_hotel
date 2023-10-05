Todo:

-   tinggal rapihin style sama layoutnya:

    -   add input file on the add room page (make it dynamic)
    -   preview photo on file

-   add an ability to delete and add photo on the edit page
-   add detail room page contain related information about room
    -   display as card
    -   add [overlay](https://imagekit.io/blog/css-image-overlay/) container for handle preview images [Fitur cancelled]
        -   like traveloka does, [codepen reference](https://codepen.io/phillipharding/pen/QQGxWq)
-   clear unused menu in sidebar [done]
-   pagination and search room's table
-   notification feedback on success or error

Presentation Headline:
The main function of this web is to provide information related to the hotel and service in booking room

Pages:

-   guest | act as user, visitor, pengunjung
-   admin | responsible for manage data for web content
-   receptionist | responsible for serving requests from guests

Hotel Feature:
role receptionist have capability/ability/(or whatever the terms used to describe the functionality) to:

Melayani pemesanan kamar, tetapi tidak dengan pembayaran [dilakukan onsite]

role admin:
mengelola konten web dan menambahkan/register/hire resepsionis

role guest:
menyimpan history pemesanan dan tiket

Flow reserve room:

-   user fill data form
-   print ticket
-   accept digital ticket as evidence of reservation to receptionist
    (serahkan ke resepsionis :v)
-   check/validasi ticket :v
-   selesai (?)

although this project isn't perfect for real world case, but at least meet the criteria specified in the Kemendikbudristek's document

Resource assets hotel bisa di dapatkan di photo-photo yang ada pada web traveloka

Pertimbangan:

-   Apakah field harga kamar per malam perlu di pindahkan ke table type room (?)
    -   karena pada umumnya harga kamar di klasifikasikan atau di tentukan berdasarkan tipe kamar
    -   jadi mungkin kolom tipe kamar pada tabel room dibuat tabelnya secara independen saja.
    -   dan juga biar harga setiap kamar nya konsisten
