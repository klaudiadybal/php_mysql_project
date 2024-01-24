
# System zarządzania harmonogramem zajęć

## Opis
Projekt to system webowy umożliwiający zarządzanie harmonogramem zajęć w szkole lub instytucji edukacyjnej. System obsługuje cztery główne sekcje: harmonogramy, kursy, nauczyciele i grupy. Działa zarówno w trybie administratora, który ma pełne uprawnienia do dodawania, modyfikowania i usuwania danych, jak i w trybie gościa, który może przeglądać dane oraz wykonywać wyszukiwania.

## Instalacja
 Aby zainstalować aplikację, wykonaj następujące kroki:

Pobierz kod źródłowy z repozytorium projektu.
Skonfiguruj środowisko lokalne, takie jak XAMPP.
Utwórz bazę danych MySQL i zaimportuj plik database.sql dostępny w katalogu projektu.
Skonfiguruj plik connect.php, aby zawierał odpowiednie dane do połączenia z bazą danych.

Otwórz aplikację w przeglądarce, np. pod adresem http://localhost/php_mysql_project/index.php.
## Wymagania
Aby aplikacja działała poprawnie, wymagane są:

* Środowisko lokalne (XAMPP).
* PHP w wersji 7.x.
* Baza danych MySQL.
## Konfiguracja
Po instalacji aplikacji, skonfiguruj następujące elementy:
1. **Łączenie z bazą danych:** Edytuj plik connect.php i dostosuj do swoich danych dostępu do bazy danych.

1. **Dane testowe użytkowników:**

- Administrator:

  - Nazwa użytkownika: admin
  - Hasło: uken123
- Gość
  - Brak danych - domyślny

## Opis funkcji aplikacji
### Logowanie
Aplikacja umożliwia logowanie na dwa rodzaje kont:

* Administrator: Ma pełen dostęp do funkcji modyfikujących dane.
* Gość: Ma dostęp tylko do przeglądania, wyszukiwania danych oraz dodawania harmonogramu.
### Zakładki
Aplikacja składa się z czterech zakładek, z których każda zawiera dane związane z harmonogramami, kursami, nauczycielami i grupami.

1. Harmonogramy
* Przeglądanie harmonogramów.
* Dodawanie nowych harmonogramów.
* Modyfikowanie istniejących harmonogramów.
* Usuwanie harmonogramów.
2. Kursy
* Przeglądanie kursów.
* Dodawanie nowych kursów.
* Modyfikowanie istniejących kursów.
* Usuwanie kursów.
3. Nauczyciele
* Przeglądanie nauczycieli.
* Dodawanie nowych nauczycieli.
* Modyfikowanie istniejących nauczycieli.
* Usuwanie nauczycieli.
4. Grupy
* Przeglądanie grup.
* Dodawanie nowych grup.
* Modyfikowanie istniejących grup.
* Usuwanie grup.

Akcje dodawania, usuwania oraz modyfikwania dostępne są tylko z poziomu zalogowanego użytkownika, z wyjątkiem dodawania harmonogramu, które dostępne jest też z poziomu gościa. 

### Wyszukiwanie
Każda zakładka umożliwia wyszukiwanie fraz wśród danych.
Wyszukiwanie dostępne jest tylko z poziomu gościa.
