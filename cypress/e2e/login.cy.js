/// <reference types="cypress" />


describe('', () => {
    it('login', () => {
        cy.visit('http://127.0.0.1:8000/login');
        cy.get('.login-btn').should('be.visible').click();
    })
})