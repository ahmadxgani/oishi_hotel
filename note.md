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

commit changes:

-   add feature: added image previews so that users can delete or leave the images they want with certainty on edit room type's page [wip]
-   remove corespond room photo once room type record deleted [done on `fea39a539a6079dada34e97f301c39e115f78352`]

Route auth bawaan `laravel/ui` Starter kit/Scaffold/Boilerplate:

-   login
-   register
-   forgot (email blade)

-   reset (from link reset in the email inbox)
-   confirm (page for something like pre-reset password in the profile, think like a sudo permission XD)
-   verify (after register redirected into here)
