# nkgContactBundle

Allows you to manage a list of contacts.

Included:

- Contact entity (Nkg\ContactBundle\Entity\Contact) and associations for contact's interests (Interest), localisation (Country + Localisation), profession (Profession)

- Contact form type (Nkg\ContactBundle\Form\ContactType)

- Contact service (Nkg\ContactBundle\Services\ContactService)

<br/>
<h3>How to install :</h3>

1 - install bundle via packagist

2 - install dependencies : run *composer update*

3 - install database : run *php app/console doctrine:schema:update --force*

4 - install fixtures : run *php app/console doctrine:fixtures:load*

5 - add this entity manager to your config.yml :

```
NkgContactBundle: ~
```

5 - add this configuration to your config.yml :

`nkg_contact:`

`contact_class: Nkg\ContactBundle\Entity\Contact`

`contact_service: 'Nkg\ContactBundle\Services\ContactService'`

`contact_repository: 'NkgContactBundle:Contact'`

<h3>How to modify</h3>

Modify the entity by extending Nkg\ContactBundle\Entity\Contact, and changing the values of `nkg_contact.contact_class` and `nkg_contact.contact_repository` in config.yml.

To use a different service, change the value of `nkg_contact.contact_service` in config.yml.
