#ifndef GENCARDS_H
#define GENCARDS_H

struct card {
    int rank;
    int suit;
};

struct card* generateDeck(int deckNumber);

void shuffleDeck(struct card* deck, int seed, int deckNumber);

void sortDeck(struct card* deck, int deckNumber);

void printDeck(struct card* deck, int deckNumber);

void freeDeck(struct card* deck);

#endif //!GENCARDS_H
