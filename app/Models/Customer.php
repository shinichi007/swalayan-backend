<?php

namespace App\Models;

class Customer
{
    private static $customers = [
        [
            "id" => 1,
            "data" => [
                "name" => "Ismail Wahyudin",
                "phone" => "083409417504",
                "email" => "ismail@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/1.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Ismail Wahyudin",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "6333133541",
                "point" => 195,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 2,
            "data" => [
                "name" => "Victoria Permata",
                "phone" => "088230695258",
                "email" => "victoria@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/1.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Victoria Permata",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "7617361228",
                "point" => 165,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 3,
            "data" => [
                "name" => "Zulfa Hassanah",
                "phone" => "087594866212",
                "email" => "zulfa@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/2.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Zulfa Hassanah",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "pending",
                "id" => "",
                "point" => 0,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 4,
            "data" => [
                "name" => "Rudi Tamba",
                "phone" => "088394306450",
                "email" => "rudi@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/2.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Rudi Tamba",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "8512670004",
                "point" => 196,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 5,
            "data" => [
                "name" => "Yessi Andriani",
                "phone" => "088201221907",
                "email" => "yessi@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/3.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Yessi Andriani",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "pending",
                "id" => "",
                "point" => 0,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 6,
            "data" => [
                "name" => "Mahdi Anggriawan",
                "phone" => "085561767298",
                "email" => "mahdi@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/3.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Mahdi Anggriawan",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "5449404703",
                "point" => 369,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 7,
            "data" => [
                "name" => "Yulia Melani",
                "phone" => "087554941371",
                "email" => "yulia@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/4.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Yulia Melani",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "1631740412",
                "point" => 385,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 8,
            "data" => [
                "name" => "Dariati Tampubolon",
                "phone" => "087252793454",
                "email" => "dariati@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/5.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Dariati Tampubolon",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "pending",
                "id" => "",
                "point" => 0,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 9,
            "data" => [
                "name" => "Cakrabirawa Mansur",
                "phone" => "082355591817",
                "email" => "cakrabirawa@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/4.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Cakrabirawa Mansur",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "3044100803",
                "point" => 371,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 10,
            "data" => [
                "name" => "Cahyo Saputra",
                "phone" => "084878348129",
                "email" => "cahyo@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/5.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Cahyo Saputra",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "pending",
                "id" => "",
                "point" => 0,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 11,
            "data" => [
                "name" => "Tari Fujiati",
                "phone" => "084864875441",
                "email" => "tari@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/6.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Tari Fujiati",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "3435530430",
                "point" => 337,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 12,
            "data" => [
                "name" => "Nasim Saragih",
                "phone" => "087206142571",
                "email" => "nasim@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/6.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Nasim Saragih",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "7923790714",
                "point" => 440,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 13,
            "data" => [
                "name" => "Argono Adriansyah",
                "phone" => "087789996190",
                "email" => "argono@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/7.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Argono Adriansyah",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "pending",
                "id" => "",
                "point" => 0,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 14,
            "data" => [
                "name" => "Irma Andriani",
                "phone" => "084309553875",
                "email" => "irma@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/7.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Irma Andriani",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "7049457692",
                "point" => 141,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 15,
            "data" => [
                "name" => "Opan Natsir",
                "phone" => "089219849133",
                "email" => "opan@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/8.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Opan Natsir",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 16,
            "data" => [
                "name" => "Mala Astuti",
                "phone" => "085556623989",
                "email" => "mala@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/9.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Mala Astuti",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "1757353634",
                "point" => 395,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 17,
            "data" => [
                "name" => "Eman Sihombing",
                "phone" => "082523120861",
                "email" => "eman@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/10.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Eman Sihombing",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "4561579100",
                "point" => 237,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 18,
            "data" => [
                "name" => "Talia Fujiati",
                "phone" => "088877759116",
                "email" => "talia@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/8.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Talia Fujiati",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "3507002411",
                "point" => 151,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 19,
            "data" => [
                "name" => "Tirta Pranowo",
                "phone" => "083930919380",
                "email" => "tirta@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/11.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Tirta Pranowo",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "2763986367",
                "point" => 312,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 20,
            "data" => [
                "name" => "Kasusra Hutapea",
                "phone" => "086955558290",
                "email" => "kasusra@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/12.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Kasusra Hutapea",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 21,
            "data" => [
                "name" => "Ajimat Anggriawan",
                "phone" => "085733076436",
                "email" => "ajimat@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/13.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Ajimat Anggriawan",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "9383398245",
                "point" => 421,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 22,
            "data" => [
                "name" => "Ana Hariyah",
                "phone" => "083405811726",
                "email" => "ana@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/9.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Ana Hariyah",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 23,
            "data" => [
                "name" => "Malik Wacana",
                "phone" => "086635278512",
                "email" => "malik@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/14.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Malik Wacana",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "2372655086",
                "point" => 208,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 24,
            "data" => [
                "name" => "Cengkal Hardiansyah",
                "phone" => "084452249923",
                "email" => "cengkal@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/15.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Cengkal Hardiansyah",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "8183722585",
                "point" => 481,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 25,
            "data" => [
                "name" => "Cakrajiya Sirait",
                "phone" => "084567148518",
                "email" => "cakrajiya@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/16.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Cakrajiya Sirait",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 26,
            "data" => [
                "name" => "Febi Mulyani",
                "phone" => "082247157609",
                "email" => "febi@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/10.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Febi Mulyani",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "6236463528",
                "point" => 40,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 27,
            "data" => [
                "name" => "Galur Marpaung",
                "phone" => "084602886873",
                "email" => "galur@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/17.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Galur Marpaung",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 28,
            "data" => [
                "name" => "Bakti Sihotang",
                "phone" => "083892176398",
                "email" => "bakti@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/18.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Bakti Sihotang",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "8551471772",
                "point" => 273,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 29,
            "data" => [
                "name" => "Ratih Purnawati",
                "phone" => "082252217649",
                "email" => "ratih@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/11.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Ratih Purnawati",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "7270818152",
                "point" => 420,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 30,
            "data" => [
                "name" => "Heryanto Suryono",
                "phone" => "085448160131",
                "email" => "heryanto@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/19.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Heryanto Suryono",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 31,
            "data" => [
                "name" => "Dina Fujiati",
                "phone" => "088641767730",
                "email" => "dina@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/12.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Dina Fujiati",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "5324746241",
                "point" => 41,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 32,
            "data" => [
                "name" => "Diana Purwanti",
                "phone" => "086662817415",
                "email" => "diana@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/13.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Diana Purwanti",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 33,
            "data" => [
                "name" => "Gaduh Marpaung",
                "phone" => "082155400754",
                "email" => "gaduh@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/20.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Gaduh Marpaung",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "7273901066",
                "point" => 79,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 34,
            "data" => [
                "name" => "Lili Laksmiwati",
                "phone" => "088548472404",
                "email" => "lili@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/14.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Lili Laksmiwati",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "4563315544",
                "point" => 343,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 35,
            "data" => [
                "name" => "Halima Mulyani",
                "phone" => "081376414541",
                "email" => "halima@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/15.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Halima Mulyani",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 36,
            "data" => [
                "name" => "Mursita Adriansyah",
                "phone" => "081188129641",
                "email" => "mursita@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/16.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Mursita Adriansyah",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "4195383614",
                "point" => 455,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 37,
            "data" => [
                "name" => "Gatot Siregar",
                "phone" => "083921326011",
                "email" => "gatot@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/21.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Gatot Siregar",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 38,
            "data" => [
                "name" => "Bagya Haryanto",
                "phone" => "089894051637",
                "email" => "bagya@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/22.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Bagya Haryanto",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "8845962324",
                "point" => 168,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 39,
            "data" => [
                "name" => "Indah Haryanti",
                "phone" => "086220652016",
                "email" => "indah@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/17.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Indah Haryanti",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "7794907395",
                "point" => 368,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 40,
            "data" => [
                "name" => "Septi Nasyidah",
                "phone" => "083275439737",
                "email" => "septi@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/18.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Septi Nasyidah",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 41,
            "data" => [
                "name" => "Rendy Mustofa",
                "phone" => "089925543410",
                "email" => "rendy@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/23.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Rendy Mustofa",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "2021408675",
                "point" => 377,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 42,
            "data" => [
                "name" => "Kasiyah Nuraini",
                "phone" => "089995488689",
                "email" => "kasiyah@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/19.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Kasiyah Nuraini",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 43,
            "data" => [
                "name" => "Siti Mardhiyah",
                "phone" => "089445607363",
                "email" => "siti@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/20.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Siti Mardhiyah",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "2409307211",
                "point" => 176,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 44,
            "data" => [
                "name" => "Rahayu Hastuti",
                "phone" => "082129127517",
                "email" => "rahayu@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/24.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Rahayu Hastuti",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "9965997561",
                "point" => 358,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 45,
            "data" => [
                "name" => "Danu Saputra",
                "phone" => "084337238152",
                "email" => "danu@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/25.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Danu Saputra",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 46,
            "data" => [
                "name" => "Yuni Usamah",
                "phone" => "086954854535",
                "email" => "yuni@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/21.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Yuni Usamah",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "3318409344",
                "point" => 387,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 47,
            "data" => [
                "name" => "Betania Maryati",
                "phone" => "086789920871",
                "email" => "betania@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/22.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Betania Maryati",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
        [
            "id" => 48,
            "data" => [
                "name" => "Prima Siregar",
                "phone" => "086199333749",
                "email" => "prima@gmail.com",
                "gender" => "male",
                "avatar" => "https://randomuser.me/api/portraits/men/26.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Prima Siregar",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "7705080627",
                "point" => 50,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 49,
            "data" => [
                "name" => "Ani Wulandari",
                "phone" => "088570805952",
                "email" => "ani@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/23.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Ani Wulandari",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "member",
                "id" => "4469792698",
                "point" => 57,
                "data" => [
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "nik" => 32070506950005,
                    "ktp" => "https://png.pngtree.com/png-vector/20230107/ourmid/pngtree-ktp-residents-identity-card-id-card-free-vector-png-image_6555300.png",
                    "ktp_name" => "Mahmudin Solehudin",
                    "gender" => "Laki-Laki",
                    "dob" => "Jakarta, 12 Juli 2022"
                ]
            ]
        ],
        [
            "id" => 50,
            "data" => [
                "name" => "Iriana Laksmiwati",
                "phone" => "086359624661",
                "email" => "iriana@gmail.com",
                "gender" => "female",
                "avatar" => "https://randomuser.me/api/portraits/women/24.jpg",
            ],
            "address" => [
                [
                    "id" => 1,
                    "type" => "Rumah",
                    "name" => "Iriana Laksmiwati",
                    "phone" => "083409417504",
                    "address" => "Jl Kaligarang 23, Jawa Tengah",
                    "default" => true,
                    "city" => "Semarang",
                    "zip" => "50237"
                ],
                [
                    "id" => 2,
                    "type" => "Kantor",
                    "name" => "Victoria Permata",
                    "phone" => "088230695258",
                    "default" => false,
                    "address" => "Jl Pasar Kembang 74, Jawa Timur",
                    "city" => "Surabaya",
                    "zip" => "60253"
                ],
                [
                    "id" => 3,
                    "type" => "Tetangga",
                    "name" => "Zulfa Hassanah",
                    "phone" => "087594866212",
                    "default" => false,
                    "address" => "Jl Iskandarsyah Raya 35 Ged Balai Krida Lt 2, Dki Jakarta",
                    "city" => "Jakarta",
                    "zip" => "12160"
                ],
            ],
            "member" => [
                "status" => "",
                "id" => "",
                "point" => 0,
                "data" => []
            ]
        ],
    ];

    public static function all()
    {
        return collect(self::$customers);
    }

    public static function regular()
    {
        $customer = static::all();
        return $customer->where('member.status', '');
    }

    public static function member()
    {
        $customer = static::all();
        return $customer->where('member.status', "member");
    }

    public static function pending()
    {
        $customer = static::all();
        return $customer->where('member.status', "pending");
    }

    public static function detailCustomer($id)
    {
        $customer = static::all();
        return $customer->where('id', $id);
    }

    public static function countCustomer()
    {
        $customer = static::all();
        return $customer->count();
    }

    public static function countMember()
    {
        $customer = static::all();
        return $customer->where('member.status', "member")->count();
    }

    public static function countPending()
    {
        $customer = static::all();
        return $customer->where('member.status', "pending")->count();
    }
}
