Presentation Headline:
The main function of this web is to provide information related to the hotel and service in booking room

Pages:

-   guest | act as user, visitor, pengunjung
-   admin | responsible for manage data for web content
-   receptionist | responsible for serving requests from guests

Hotel Feature divided into seperated roles:

role receptionist have capability/ability/(or whatever the terms used to describe the functionality) to:

-   Melayani pemesanan kamar, tetapi tidak dengan pembayaran [dilakukan onsite]
    -   seperti menangani guest ketika melakukan checkin

role admin:

-   mengelola konten web dan menambahkan/register/hire resepsionis

role guest:

-   menyimpan history pemesanan

    -   dan dapat melihat informasi tentang: status dari pemesanannya, tanggal rentang booking, jumlah orang yang menginap, total harga yang harus dibayar

-   melihat tiket digital dan invoice dari pemesanan yang sedang berlangsung (?)

Flow reserve/booking room:

-   user register an account
-   verify the email
-   login with created account
-   user fill data form
-   print ticket
-   accept digital ticket as evidence of reservation to receptionist
    (serahkan ke resepsionis :v)
-   check/validasi ticket :v
-   selesai (?)

Overall flow reserve/booking room:

-   guest booking a room on the form page
-   validate the request and assume the request was valid, then
-   a new booking record was added into bookings table
-   guest is now able to go to the hotel and check-in
-   receptionist take a look into the bookings table
-   once a guest pay the invoice (offline), then the receptionist set the booking status to paid and mark the check-in date with current time
-   also receptionist responsible to mark the check-out date too

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

Rule booking:

-   1 kamar hanya dapat di isi 2 adult dan 2 children
-   room availability
-   maksimal checkin jam 02
-   maksimal checkout jam 12

Rule booking item (handled by receptionist):

-   rentang check-in nya harus diantara rentang booking

// '2023-10-11'
// '2023-10-16'
// check apakah ada data record yang sesuai dengan pengkondisian diantara input yang diberikan

<<<SQL
SELECT \* FROM bookings WHERE
(date_book_start BETWEEN '2023-10-14' AND '2023-10-16') OR
(date_book_end BETWEEN '2023-10-15' AND '2023-10-16') OR
('2023-10-15' BETWEEN date_book_start AND date_book_end)
SQL;

// data book start yang ada pada tabel database tidak boleh berada dalam jangkauan $dataStart dan '2023-10-16'
// begitupun dengan data book end

<<<SQL
SELECT \* FROM rooms AS r WHERE NOT EXISTS (
SELECT 1 FROM booking_items
INNER JOIN bookings ON bookings.id = booking_items.booking_id
INNER JOIN rooms ON rooms.id = booking_items.room_id
INNER JOIN room_types ON room_types.id = rooms.room_type_id
WHERE
rooms.id = r.id AND
) AND r.room_type_id = 1
SQL;

// Terbooking: (start: '2023-10-11'; end: '2023-10-14')

// the rule agar valid untuk dipesan alias ruangan kosong:
// if NULL then pass OR
// `pending start` >= `end current booked` OR
// `pending start` < `start current booked` & `pending end` <= `start current booked`
// `pending start` < `start current booked` & `pending end` <= `start current booked` (SALAH KARENA END ADA DI RENTANG START DAN END DARI CURRENT BOOKED: LIHAT CASE 2)

-   CASE 1: (boleh) (harus tidak muncul yang booking)

start: '2023-10-14'; end: '2023-10-15'

-   CASE 2: (gak boleh) (harus muncul yang terbooking)

start: '2023-10-09'; end: '2023-10-13'

-   CASE 3: (gak boleh) (harus muncul yang terbooking) karena start nya sama

start: '2023-10-11'; end: '2023-10-13'

-   CASE 4: (boleh) (harus tidak muncul yang booking)

start: '2023-10-09'; end: '2023-10-11'

```sql
SELECT rooms.id FROM rooms
LEFT JOIN booking_items ON rooms.id = booking_items.room_id
LEFT JOIN bookings ON bookings.id = booking_items.booking_id
WHERE
-- Rule 0
(bookings.date_book_start IS NULL AND bookings.date_book_end IS NULL) OR
(
-- Rule 1
('2023-10-14' >= bookings.date_book_end) OR

-- Rule 2
('2023-10-14' < bookings.date_book_start AND '2023-10-15' <= bookings.date_book_start)

)
GROUP BY rooms.id;
```
