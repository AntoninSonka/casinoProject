#include "genCards.h"
#include <stdio.h>
#include <time.h>

int main(){
    struct card* deck = generateDeck(6);
    printDeck(deck, 6);
    shuffleDeck(deck, time(NULL), 6);
    printf("\n");
    printDeck(deck, 6);
    freeDeck(deck);
    return 0;
}
