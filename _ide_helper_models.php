<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $street
 * @property string $house_number
 * @property string $postal_code
 * @property string $latitude
 * @property string $longitude
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $profile_id
 * @property int $city_id
 * @property-read \App\Models\City $city
 * @property-read \App\Models\Profile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereHouseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $name
 * @property int|null $state_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\State|null $state
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $sortname
 * @property string $name
 * @property int $phonecode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\State> $states
 * @property-read int|null $states_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country wherePhonecode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereSortname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $type
 * @property int|null $number_ci
 * @property int|null $RECEIPT_N
 * @property int|null $sky
 * @property string|null $rif_url
 * @property string|null $taxDomicile
 * @property string|null $commune_register
 * @property string|null $community_rif
 * @property string|null $front_image
 * @property \Illuminate\Support\Carbon|null $issued_at
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property bool $approved
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $profile_id
 * @property-read mixed $back_image
 * @property-read \App\Models\Profile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCommuneRegister($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCommunityRif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereFrontImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereIssuedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereNumberCi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereRECEIPTN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereRifUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereSky($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereTaxDomicile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 */
	class Document extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $profile_id
 * @property string $email
 * @property int $is_primary
 * @property int $status
 * @property int $approved
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Profile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereUpdatedAt($value)
 */
	class Email extends \Eloquent {}
}

namespace App\Models{
/**
 * @property-read \App\Models\Profile|null $profile
 * @property-read \App\Models\Profile|null $relatedProfile
 * @method static \Illuminate\Database\Eloquent\Builder|Family newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Family newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Family query()
 */
	class Family extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $gas_cylinder_code
 * @property int|null $cylinder_quantity
 * @property string|null $cylinder_type
 * @property string|null $cylinder_weight
 * @property int $approved
 * @property string|null $photo_gas_cylinder
 * @property string|null $manufacturing_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $profile_id
 * @property int|null $company_supplier_id
 * @property-read \App\Models\GasSupplier|null $gasSupplier
 * @property-read \App\Models\GasTicket|null $gasTicket
 * @property-read \App\Models\Profile $profile
 * @method static \Database\Factories\GasCylinderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder query()
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder whereCompanySupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder whereCylinderQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder whereCylinderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder whereCylinderWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder whereGasCylinderCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder whereManufacturingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder wherePhotoGasCylinder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasCylinder whereUpdatedAt($value)
 */
	class GasCylinder extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $contact_info
 * @property string|null $address
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Profile|null $gasSuppliers
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GasTicket> $gasTickets
 * @property-read int|null $gas_tickets_count
 * @method static \Database\Factories\GasSupplierFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|GasSupplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasSupplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasSupplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|GasSupplier whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasSupplier whereContactInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasSupplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasSupplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasSupplier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasSupplier whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasSupplier whereUpdatedAt($value)
 */
	class GasSupplier extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $queue_position
 * @property string $time_position
 * @property string|null $qr_code
 * @property string $reserved_date
 * @property string $appointment_date
 * @property string $expiry_date
 * @property string|null $status
 * @property int $profile_id
 * @property int|null $gas_cylinders_id
 * @property int $station_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Email> $emails
 * @property-read int|null $emails_count
 * @property-read \App\Models\GasCylinder|null $gasCylinder
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Phone> $phones
 * @property-read int|null $phones_count
 * @property-read \App\Models\Profile $profile
 * @property-read \App\Models\Station $station
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\GasTicketFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereAppointmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereGasCylindersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereQrCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereQueuePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereReservedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereTimePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GasTicket whereUpdatedAt($value)
 */
	class GasTicket extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Phone> $phones
 * @property-read int|null $phones_count
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorCode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorCode whereUpdatedAt($value)
 */
	class OperatorCode extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $profile_id
 * @property int $operator_code_id
 * @property string $number
 * @property int $is_primary
 * @property int $status
 * @property int $approved
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OperatorCode $operatorCode
 * @property-read \App\Models\Profile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|Phone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone primary()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereOperatorCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereUpdatedAt($value)
 */
	class Phone extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property string $secondLastName
 * @property string|null $photo_users
 * @property string $date_of_birth
 * @property string $maritalStatus
 * @property string $sex
 * @property string $status
 * @property int|null $station_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Email> $emails
 * @property-read int|null $emails_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GasCylinder> $gasCylinders
 * @property-read int|null $gas_cylinders_count
 * @property-read \App\Models\GasSupplier|null $gasSuppliers
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GasTicket> $gasTickets
 * @property-read int|null $gas_tickets_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Phone> $phones
 * @property-read int|null $phones_count
 * @property-read \App\Models\Station|null $station
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ProfileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile wherePhotoUsers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereSecondLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 */
	class Profile extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $name
 * @property int|null $countries_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\Country|null $country
 * @method static \Illuminate\Database\Eloquent\Builder|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State query()
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCountriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereUpdatedAt($value)
 */
	class State extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $location
 * @property string|null $code_plus
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $contact_number
 * @property string|null $responsible_person
 * @property string $days_available
 * @property string $opening_time
 * @property string $closing_time
 * @property int $active
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\StationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Station newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station query()
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereClosingTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCodePlus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereDaysAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereOpeningTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereResponsiblePerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereUpdatedAt($value)
 */
	class Station extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $google_id
 * @property string|null $given_name
 * @property string|null $family_name
 * @property string|null $profile_pic
 * @property string|null $AccessToken
 * @property int $completed_onboarding
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Profile|null $profile
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompletedOnboarding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFamilyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGivenName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

