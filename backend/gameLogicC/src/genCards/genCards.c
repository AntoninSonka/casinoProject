#include "genCards.h"
#include <stdio.h>
#include <stdlib.h>

struct card* generateDeck(int deckNumber){
    struct card* deck = malloc(sizeof(struct card) * 52 * deckNumber);
    int cardNum = 0;
    for(int i = 0; i < deckNumber; ++i){
        for(int j = 0; j < 4; ++j){
            for(int k = 1; k < 14; ++k){
                deck[cardNum].suit = j;
                deck[cardNum].rank = k;
                ++cardNum;
            }
        }
    }
    return deck;
}

void swap(struct card* c1, struct card* c2){
    struct card c3 = *c1;
    *c1 = *c2;
    *c2 = c3;
}

void shuffleDeck(struct card* deck, int seed, int deckNumber){
    srand(seed);
    for(int i = ((52 * deckNumber) - 1); i > 0; --i){
        swap(&(deck[i]), &(deck[rand() % (i + 1)]));
    }
}

void sortDeck(struct card* deck, int deckNumber){

}

void printDeck(struct card* deck, int deckNumber){
    for(int i = 0; i < (52 * deckNumber); ++i){
        printf("suit: %d, rank: %d\n", deck[i].suit, deck[i].rank);
    }
}

void freeDeck(struct card* deck){
    free(deck);
}
