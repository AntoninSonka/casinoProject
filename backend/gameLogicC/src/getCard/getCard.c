#include "genCards.h"
#include <stdio.h>
#include <stdlib.h>

int main(int argc, char** argv){
    int seed = atoi(argv[1]);
    int deckNum = atoi(argv[2]);
    int index = atoi(argv[3]);
    struct card* deck = generateDeck(deckNum);
    shuffleDeck(deck, seed, deckNum);
    printf("%d\n", deck[index].suit);
    printf("%d\n", deck[index].rank);
    freeDeck(deck);
    return 0;
}
