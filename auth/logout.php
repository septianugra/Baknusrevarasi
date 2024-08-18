<?php
session_start();
session_destroy();
echo "<script>alert('Berhasil logout dari BAKNUS REVARASI!'); window.location='../index.php';</script>";