#!/bin/bash

# Absoluter Pfad zum Verzeichnis, in dem dieses Skript liegt
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

# SQL-Datei im selben Verzeichnis
SQL_FILE="$SCRIPT_DIR/create_user_profile_tables.sql"

# MySQL ausführen mit utf8mb4
mysql --default-character-set=utf8mb4 -u root -p < "$SQL_FILE"