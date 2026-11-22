@extends('layouts.app')

@section('titre', 'Contact')

@section('contenu')
    <section class="page-hero">
        <div class="page-hero-inner">
            <div class="eyebrow">Contact</div>
            <h1>Nous sommes à votre écoute.</h1>
            <p>Pour toute question, commande ou renseignement, contactez-nous directement.</p>
        </div>
    </section>

    <section class="section">
        <div class="contact-grid">
            <div class="contact-card">
                <div class="icon">📞</div>
                <div>
                    <h4>Téléphone</h4>
                    <a href="tel:+221772720987">+221 77 272 09 87</a>
                </div>
            </div>

            <div class="contact-card">
                <div class="icon">✉️</div>
                <div>
                    <h4>Email</h4>
                    <a href="mailto:moussavounelson3@gmail.com">moussavounelson3@gmail.com</a>
                </div>
            </div>

            <div class="contact-card">
                <div class="icon">📍</div>
                <div>
                    <h4>Adresse</h4>
                    <p>Dakar, Sénégal</p>
                </div>
            </div>

            <div class="contact-card">
                <div class="icon">🕒</div>
                <div>
                    <h4>Horaires</h4>
                    <p>Lun - Sam : 9h00 - 18h00</p>
                </div>
            </div>
        </div>
    </section>
@endsection
